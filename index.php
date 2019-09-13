<?php

    require_once 'config/config.php';
    require_once 'config/autoload.php';
    
    //$rq = new App();
    #require_once 'libs/Validate.php';

    $string = " Juan ";
    print_r( "delimiter".$string."delimiter" );
    echo "<br>";
    $string = Validate::validateString($string);
    print_r( "delimiter".$string."delimiter" );
    echo "<br>";
    echo gettype($string);
    echo "<hr>";


    $correo = " cubjgmail.com ";
    print_r( "delimiter".$correo."delimiter" );
    echo "<br>";
    $correo = Validate::validateEmail( $correo );
    print_r( "delimiter".$correo."delimiter" );
    echo "<br>";
    echo gettype($correo);
    echo "<hr>";

?>