<?php 
    namespace PHPMVC\LIB\Template;

    class Template {
        use TemplateHelper;
        private $_templateParts ;
        private $_action_view ;
        private $_data ;
        private $_registry ;

        public function __construct(array $parts){
            $this->_templateParts = $parts;
        }

        public function __get($key){
            // to make ease of use of objects inside regestry ibject , send rgestry to view to make it accessibe
            return $this->_registry->$key;
        }

        public function setActionViewFile ($view_path){
            $this->_action_view = $view_path;
        }

        public function setRegistry ($registry){
            $this->_registry = $registry;
        }

        // data which go to file i will use
        public function setAppData($data){
            $this->_data = $data;
        }


        public function swapTemplate($template)
        {
            $this->_templateParts['template'] = $template;
        }

        private function renderHeaderStart(){
            extract($this->_data);
            require_once TEMPLATE_PATH . 'templateheaderstart.php' ;
        }

        private function renderHeaderEnd(){
            extract($this->_data);
            require_once TEMPLATE_PATH . 'templateheaderend.php' ;
        }

        private function renderTemplateFooter(){
            extract($this->_data);
            require_once TEMPLATE_PATH . 'templatefooter.php' ;
        }

        // blocks in template config page araay()
        private function renderTemplateBlocks(){
            if(!array_key_exists('template' , $this->_templateParts)){
                trigger_error('sorry you  have to define template blocks' , E_USER_WARRING);
            }else{
                $parts = $this->_templateParts['template'];
                if(!empty($parts)){
                    extract($this->_data);
                    foreach ($parts as $partkey =>$file) {
                        if($partkey === ':view'){
                            require_once $this->_action_view;
                        }else{
                            require_once $file;
                        }
                    }
                }
            }
        }

        // get header files
        private function renderHeaderResourses(){
            $output = ''; 

            if(!array_key_exists('header_resources', $this->_templateParts)) {
                trigger_error('Sorry you have to define the header resources', E_USER_WARNING);
            }else{
                $resourses = $this->_templateParts['header_resources'];

                // genrate css links
                $css = $resourses['css'];
                if(!empty($css)){
                    foreach ($css as $cssKey =>$path) {
                        $output .= "<link type = 'text/css' rel='stylesheet' href= '". $path ."' />";
                    }
                }

                // genrate js links
                $js = $resourses['js'];
                if(!empty($js)){
                    foreach ($js as $jsKey =>$path) {
                        $output .= "<script src= '". $path ."'></script>";
                    }
                }
            }
            echo $output;
        }


        private function renderFooterResourses(){
            extract($this->_data);
            $output = '';

            if(!array_key_exists('footer_resources', $this->_templateParts)) {
                trigger_error('Sorry you have to define the footer resources', E_USER_WARNING);
            }else{
                $resourses = $this->_templateParts['footer_resources'];
                if(!empty($resourses)){
                    foreach ($resourses as $resourseKey =>$path) {
                        $output .= "<script src= '". $path ."'></script>";
                    }
                }
            }
            echo $output;
        }

        public function renderApp(){
            // require_once TEMPLATE_PATH . 'wrapperstart.php' ;
            // require_once TEMPLATE_PATH . 'header.php' ;
            // require_once TEMPLATE_PATH . 'nav.php' ;
            // require_once $this->_action_view;
            // require_once TEMPLATE_PATH . 'wrapperend.php' ;

            extract($this->_data);
            $this->renderHeaderStart();
            $this->renderHeaderResourses();
            $this->renderHeaderEnd();
            $this->renderTemplateBlocks();
            $this->renderFooterResourses();
            $this->renderTemplateFooter();
        }
    }

?>