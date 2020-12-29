<?php 
    return [
        'template' => [
            'wrapper_start'           => TEMPLATE_PATH . 'wrapperstart.php',
            'header'                  => TEMPLATE_PATH . 'navbar.php' , 
            'nav'                     => TEMPLATE_PATH . 'sidebar.php' ,
            ':view'                   => ':action_view' ,
            'wrapper_end'             => TEMPLATE_PATH . 'wrapperend.php' 
        ] ,

        'header_resources' => [
            'css'     => [
                'normalize'           => CSS . 'normalize.css' , 
                'bootstrap'           => CSS . 'bootstrap.min.css' , 
                'fontawsome'          => CSS . 'fontawsome.min.css' , 
                'style'                => CSS . 'style.css' 
            ] ,
            'js'     => [
                
            ]
        ] ,
        
        'footer_resources' => [
            'popper'                 => JS .'popper.min.js' ,
            'jquery'                 => JS .'jquery-3.4.1.min.js' ,
            'bootstrap'              => JS .'bootstrap.min.js' ,
            'app'                    => JS .'app.js' ,
        ]
    ];

?>