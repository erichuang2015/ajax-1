<?php

declare(strict_types=1);
/**
 * <b>Class ClienteDTO</b>
 * Clase que representa objetos Cliente, que ayudaran a estructurar la información en la base de datos
 */
class ClienteDTO{

    private $id_cliente;
    private $razon_social;
    private $rfc;
    private $correo;
    private $telefono;
    private $direccion;
    private $nombre;
    private $apaterno;
    private $amaterno;
    private $correo_repre;
    private $celular_repre;


    public function __construct(){
    }

    /**
     * Devuelve el id del cliente
     * @return int
     */
    public function getIdCliente(): int
    {
        return $this->id_cliente;
    }

    /**
     * define el id del cliente
     * @param mixed $id_cliente
     */
    public function setIdCliente(int $id_cliente): void
    {
        $this->id_cliente = $id_cliente;
    }

    /**
     * Devuelve el nombre de la Razón Social de la organización
     * @return string
     */
    public function getRazonSocial(): string
    {
        return $this->razon_social;
    }

    /**
     * Define la Razón Social de la organización
     * @param string
     */
    public function setRazonSocial(string $razon_social): void
    {
        $this->razon_social = $razon_social;
    }

    /**
     * Devuelve el RFC del cliente
     * @return string
     */
    public function getRfc(): string
    {
        return $this->rfc;
    }

    /**
     * Define el RFC del cliente, validando solamente 13 caracteres
     * @param string $rfc
     */
    public function setRfc(string $rfc): void
    {
        $this->rfc = (strlen($rfc) > 13) ? null : $rfc;
    }

    /**
     * Devuelve el nombre de correo de un cliente
     * @return string
     */
    public function getCorreo(): string
    {
        return $this->correo;
    }

    /**
     * Define el nombre de correo electrónico del cliente
     * @param string $correo
     */
    public function setCorreo(string $correo): void
    {
        $this->correo = $correo;
    }

    /**
     * Devuelve el numero telefonico del cliente
     * @return string
     */
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    /**
     * Define el numero telefonico de un cliente
     * @param string $telefono
     */
    public function setTelefono(string $telefono): void
    {
        $this->telefono = (strlen($telefono) > 10) ? null : $telefono;
    }

    /**
     * Devuelve la dirección del cliente
     * @return string
     */
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    /**
     * Define la dirección donde se ubica el cliente
     * @param string $direccion
     */
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    /**
     * Devuelve el nombre del representante legal
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Define el nombre del representate legal del cliente
     * @param string $nombre
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Devuelve el apellido paterno del representante legal
     * @return string
     */
    public function getApaterno(): string
    {
        return $this->apaterno;
    }

    /**
     * Define el apellido paterno del representate legal del cliente
     * @param string $apaterno
     */
    public function setApaterno(string $apaterno): void
    {
        $this->apaterno = $apaterno;
    }

    /**
     * Devuelve el apellido materno del representante legal
     * @return string
     */
    public function getAmaterno(): string
    {
        return $this->amaterno;
    }

    /**
     * Define el apellido materno del representate legal del cliente
     */
    public function setAmaterno(string $amaterno): void
    {
        $this->amaterno = $amaterno;
    }

    /**
     * Devuelve el correo electronico del representate legal del cliente
     * @return string
     */
    public function getCorreoRepre(): string
    {
        return $this->correo_repre;
    }

    /**
     * Define el correo electronico del representate legal del cliente
     * @param string $correo_repre
     */
    public function setCorreoRepre(string $correo_repre): void
    {
        $this->correo_repre = $correo_repre;
    }

    /**
     * Devuelve el numero de celular del representate legal del cliente
     * @return string
     */
    public function getCelularRepre(): string
    {
        return $this->celular_repre;
    }

    /**
     * Define el numero de celular del representate legal del cliente
     * @param string $celular_repre
     */
    public function setCelularRepre(string $celular_repre): void{
        $this->celular_repre = (strlen($celular_repre) > 10) ? null : $celular_repre;
    }


    /**
     * <b>getProperties:</b>Devuelve en un arreglo el nombre de las propiedades usadas (no nulas) del objeto creado,
     * para usarlas con array_key().
     * @return array
     */
    public function getProperties() : array{
        $obj = array();
        foreach( get_object_vars($this) as $cliente => $propiedad ){
            if( $propiedad != null ){
                array_push($obj, $cliente);
            }
        }
        return $obj;
    }


} # fin de la clase