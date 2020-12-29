<?php
    namespace PHPMVC\LIB;
    use PHPMVC\LIB\Template\Template;
    use PHPMVC\LIB\Helper;

    class FrontController
    {
        use Helper;
        const NOT_FOUND_ACTION = 'notFoundAction';
        const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\notfoundController';

        private $_controller = 'index';
        private $_action = 'default';
        private $_params= array();   

        private $_template;
        private $_registry;
        private $_authentication;

        // dependanciy injection(front controler depneds on template)
        public function __construct(Template $template , Registry $registry , Authentication $auth){
            $this->_template = $template;
            $this->_registry = $registry;
            $this->_authentication = $auth;
            $this->_parseUrl();
        }

        private function _parseUrl()
        { 
            $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH) , '/') , 3);
            // result of $url 
            //   [0]=>
            //     string(10) "controller"
            //   [1]=>
            //     string(6) "action"

            if(isset($url[0]) && !empty($url[0])){    // controler in array in the link
                $this->_controller = $url[0];
            }
            if(isset($url[1]) && !empty($url[1])){    // action in array in the link
                $this->_action = $url[1];
            }
            if(isset($url[2]) && !empty($url[2])){    // paramters /email/name/1/2 in array in the link
                $this->_params = explode('/', $url[2]);
            }
        }

        public function dispatch()
        {
            // take controller and action   
            $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller) . 'Controller';
            $actionName = $this->_action . 'action';

            // Check if the user is authorized to access the application
            if(!$this->_authentication->isAuthorized()) { 
                if($this->_controller !== 'auth' && $this->_action !== 'login'){
                    $this->redirect('/auth/login');
                }
            }else{
                // user authorized  and deniy acces to auth/login
                if($this->_controller == 'auth' && $this->_action == 'login'){
                    isset($_SERVER['HTTP_REFERER']) ? $this->redirect($_SERVER['HTTP_REFERER']) : $this->redirect('/');
                }

                //enable the privelge in the system by constant check
                if((bool) CHECK_FOR_PRIVILEGES === true){
                    // check if the user has access to specific URl
                    if(!$this->_authentication->hasAccess($this->_controller , $this->_action)){
                        $this->redirect('/accessdenied');   
                    }
                }
                
            }

            // if class exist
            if(!class_exists($controllerClassName) || !method_exists($controllerClassName, $actionName)) {
                $controllerClassName = self::NOT_FOUND_CONTROLLER;
                $this->_action = $actionName = self::NOT_FOUND_ACTION;
            }
            
            // set  properties to any controller as it extend abstract controler in link by front controller
            $controller = new $controllerClassName();
            $controller->setController($this->_controller);
            $controller->setAction($this->_action);
            $controller->setParams($this->_params);
            $controller->setTemplate($this->_template);
            $controller->setRegistry($this->_registry);
            $controller->$actionName();

        }
    }

?>