<?php

    # rutas obsolutas MVC
    define( 'MVC', '/ajax/' );

    define( 'PATH', 'http://localhost' . MVC );

    define( 'PATH_LIB', $_SERVER['DOCUMENT_ROOT'] . MVC . "libs/" );

    define( 'PATH_CON', $_SERVER['DOCUMENT_ROOT'] . MVC . "controllers/" );

    define( 'PATH_VIS', $_SERVER['DOCUMENT_ROOT'] . MVC . "views/" );

    define( 'PATH_MOD', $_SERVER['DOCUMENT_ROOT'] . MVC . "models/" );



    # Rutas para recursos public
    define( 'PUBLIC_P', 'http://localhost' . MVC . 'public/' );

    # Propiedades de conextion a base de datos
    define( 'DRIVER', 'mysql' );
    define( 'HOST', '127.0.0.1');
    define( 'DB', 'phptest' );
    define( 'USER', 'root' );
    define( 'PASSWORD', 'MDEJACjm_259502' );    

?>