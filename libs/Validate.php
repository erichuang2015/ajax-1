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
        return ( preg_match("	/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/", $email) ) ?
            $email : "false";
    } # fin del método

    public static function validateId( string $number ) : int{
        $number = trim( $number, " " );
        $number = intval( $number, 10 );
        return $number;
    }# fin del metodo

    public static function validateRfc( string $rfc ) : string{
        $rfc = trim( $rfc, " " );
        $rfc = filter_var( $rfc, FILTER_SANITIZE_STRING );
        return ( strlen( $rfc ) == 13 ) ? strtoupper( $rfc ) : "false";
    } # fin del método

    public static function validateTel( string $telefono ) : string{
        $telefono = trim( $telefono, " " );
        return ( preg_match("/^[\(]?[\+]?(\d{2}|\d{3})[\)]?[\s]?((\d{6}|\d{8})|(\d{3}[\*\.\-\s]){2}\d{3}|(\d{2}[\*\.\-\s]){3}\d{2}|(\d{4}[\*\.\-\s]){1}\d{4})|\d{8}|\d{10}|\d{12}$/", $telefono) ) ?
            $telefono : "false";
    }

} # fin de la clase