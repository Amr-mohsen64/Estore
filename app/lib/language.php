<?php 
    namespace PHPMVC\LIB;

    // class to load laguage file and put the content into the dictionary
    class Language
    {
        private $_dictionary = array();

        public function load($path){
            $defaultLang = APP_DEFAULT_LANG;
            if(isset($_SESSION['lang'])){
                $defaultLang = $_SESSION['lang'];
            }   
            
            // path  = employee.default
            $pathArray = \explode('.' , $path);
            $languageFileToLoad = LANG_PATH . $defaultLang .DS . $pathArray[0] . DS . $pathArray[1] .'.lang.php' ;
            $languageFileContent = file_get_contents($languageFileToLoad);
            
            if(file_exists($languageFileToLoad)){
                require_once $languageFileToLoad;

                if(is_array($_) && !empty($_)){
                    foreach ($_ as $key => $value) {
                        // put the keys in language file in dicationary array key and value
                        $this->_dictionary[$key] = $value;
                    }
                    // var_dump($this->_dictionary);    
                }else{
                    \trigger_error('soory the language file dosent exisit'. $path ,E_USER_WARRING);
                }
            }
        }

        public function get($key)
        {
            if(array_key_exists($key, $this->_dictionary)) {
                return $this->_dictionary[$key];
            }
        }

        public function feedKey ($key, $data)
        {
            if(array_key_exists($key, $this->_dictionary)) {
                // put in data array the key
                array_unshift($data, $this->_dictionary[$key]);
                // put text_lable_username inseted of %
                return call_user_func_array('sprintf', $data);
            }
        }

        public function getDictionary()
        {
            return $this->_dictionary;
        }
    }

?>