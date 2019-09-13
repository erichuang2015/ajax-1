<?php

declare(strict_types=1);


/**
 * <b>Class Validate</b>
 * Permite invocar métodos estáticos para validar cualquier tipo de dato que manipule el formulario y devolverlo
 * listo para ser insertado hacia la BD.
 */
class Validate{

    public static function isEmpty( $var ) : boolean{

    }

    public static function validateString( string $cadena ) : string{
        # se supone que la cadena no esta vacia
        $cadena = trim($cadena," ");
        $cadena = filter_var( $cadena, FILTER_SANITIZE_STRING );
        return $cadena;
    } # fin del método

    public static function validateEmail( string $email ) : string{
        $email = trim( $email, " " );
        $email = filter_var( $email, FILTER_SANITIZE_EMAIL );
        return $email;
    } # fin del método

    public static function validateInt( string $number ) : int{
        $number = trim( $number, " " );
        $number = intval( $number, 10 );
        return $number;
    }# fin del metodo

} # fin de la clase