<?php

    spl_autoload_register( function( $class ){
        if( file_exists( PATH_LIB . $class . ".php" ) ){
            require_once PATH_LIB . $class . ".php";
        }else{
            print_r( "Error al cargar los archivos: " . $class );
        }
    } );

?>