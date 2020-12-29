<?php 
    namespace PHPMVC\LIB\Template;
    
    trait TemplateHelper {
        public function matchURL($url){
            return parse_url($_SERVER['REQUEST_URI'] ,PHP_URL_PATH ) == $url ;
        }

        // show value after post request in inputs
        public function showValue($fieldName , $object = null){
            return isset($_POST[$fieldName]) ? $_POST[$fieldName] : (is_null($object) ? '' : $object->$fieldName) ;
        }

        // make selected on select box
        public function selectedIf($fieldName , $value ,$object = null){
            return (isset($_POST[$fieldName]) && $_POST[$fieldName] == $value || !is_null($object) && $object->$fieldName == $value) ? 'selected="selected"' : '';
        }
    }
?>