<?php 
    namespace PHPMVC\LIB;

    
    /**
     * Application Constants
     */
    class AutoLoad{
        public static function autoload( $className ){
            $className = str_replace('PHPMVC' , '' , $className);
            $className = strtolower($className);
            $className = $className . '.php';
            
            // IF FILE EXISTS WITH THIS CLASS NAME  ' \lib\frontcontroller.php'
            if(file_exists(APP_PATH . $className)){
                require_once APP_PATH . $className;
            }
            
        } 
    }

    spl_autoload_register(__NAMESPACE__ . '\AutoLoad::autoload');
?>