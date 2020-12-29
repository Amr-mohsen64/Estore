<?php
    namespace PHPMVC\LIB;
    class Registry 
    {
        private static $_instance ;

        public function __construct(){}
        
        public function getInstance(){
            if(self::$_instance == null){
                self::$_instance = new self();
            }
            return self::$_instance ;
        }   

        public function __set($key , $object){
            $this->$key = $object ; 
        }
        public function __get($key){
            return $this->$key;
        }
    }



?>