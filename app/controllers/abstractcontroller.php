<?php 
    namespace PHPMVC\Controllers;
    use PHPMVC\LIB\FrontController;

    class AbstractController{
        protected $_controller;
        protected $_action;
        protected $_params;
        protected  $_data = [];
        protected $_template;
        protected $_registry;


        public function __get($key){
            // get the session or any object as language from registry at any controller
            return $this->_registry->$key;
        }

        public function notFoundAction()
        {
            $this->_view();
        }

        public function setController($controllerName)
        {
            $this->_controller = $controllerName;
        }

        public function setAction($actionName){
            $this->_action = $actionName;
        }

        public function setParams($params){
            $this->_params = $params;
        }

        public function setTemplate($template){
            $this->_template = $template;
        }

        public function setRegistry($registry){
            $this->_registry = $registry;
        }

        protected function _view(){
            // choose which view i want to want show
            $view =  VIEWS_PATH . $this->_controller . DS . $this->_action . '.view.php';
            if($this->_action == FrontController::NOT_FOUND_ACTION || !file_exists($view)){
                $view =  VIEWS_PATH .'notfound' . DS . 'notfound.view.php';
            }
                // merge array of database  + dictionary with each other
                $this->_data = array_merge($this->_data , $this->language->getDictionary());
                // extract($this->_data);
                $this->_template->setRegistry($this->_registry);
                // file to be loaded
                $this->_template->setActionViewFile($view);
                // send the data to tempalte
                $this->_template->setAppData($this->_data);
                $this->_template->renderApp();
        }
    }

?>