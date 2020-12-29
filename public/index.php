<?php 
    namespace PHPMVC;

    use PHPMVC\LIB\FrontController;
    use PHPMVC\LIB\Template\Template;
    use PHPMVC\LIB\Language;
    use PHPMVC\LIB\SessionManger;
    use PHPMVC\LIB\Registry;
    use PHPMVC\LIB\Messenger;
    use PHPMVC\LIB\Authentication;
    
    if(!defined('DS')){
        define ('DS',DIRECTORY_SEPARATOR); 
    }

    // require config file
    require_once '..' . DS . 'app' . DS .'config'. DS .'config.php' ;
    
    // require autoload file
    require_once  APP_PATH . DS . 'lib' . DS . 'autoload.php'  ;

    // require template config file


    $session = new SessionManger();
    $session->start();
    // $session->kill();

    $template_parts = require_once '..' . DS . 'app' . DS .'config'. DS .'templateconfig.php' ;
    
    if(!isset($session->lang)) {
        $session->lang = APP_DEFAULT_LANG;
    }
    

    $messenger =  Messenger::getInstance($session);
    $template = new Template($template_parts);
    $language = new Language();
    
    $authentication = Authentication::getInstance($session);
    $registry = Registry::getInstance();

    $registry->session = $session;
    $registry->language = $language;
    $registry->messenger = $messenger;

    $frontController = new FrontController($template , $registry , $authentication);
    $frontController->dispatch();
?>