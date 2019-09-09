<?php



    class Cliente{

        #       P R O P I E D A D E S
        # ----------------------------------
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


        #         M E T O D O S
        # ----------------------------------
        public function __construct( $id_cliente, $razon_social, $rfc, $direccion, $telefono, $correo, $nombre, $apaterno, $amaterno, $celular_repre, $correo_repre ){
            $this->id_cliente    = $id_cliente;
            $this->razon_social  = $razon_social;
            $this->rfc           = $rfc;
            $this->correo        = $correo;
            $this->telefono      = $telefono;
            $this->direccion     = $direccion;
            $this->nombre        = $nombre;
            $this->apaterno      = $apaterno;
            $this->amaterno      = $amaterno;
            $this->correo_repre  = $correo_repre;
            $this->celular_repre = $celular_repre;
        } # fin del metodo

        public function setIdCliente($id_cliente){
            $this->id_cliente = $id_cliente;
        }
        public function setRazonSocial($razon_social){
            $this->razon_social = $razon_social;
        }
        public function setRFC($rfc){
            $this->rfc = $rfc;
        }
        public function setCorreo($correo){
            $this->correo = $correo;
        }
        public function setTelefono($telefono){
            $this->telefono = $telefono;
        }
        public function setDireccion($direccion){
            $this->direccion = $direccion;
        }
        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
        public function setApaterno($apaterno){
            $this->apaterno = $apaterno;
        }
        public function setAmaterno($amaterno){
            $this->amaterno = $amaterno;
        }
        public function setCorreoRepre($correo_repre){
            $this->correo_repre = $correo_repre;
        }
        public function setCelularRepre($celular_repre){
            $this->celular_repre = $celular_repre;
        }

        public function getIdCliente(){
            return $this->id_cliente;
        }
        public function getRazonSocial(){
            return $this->razon_social;
        }
        public function getRFC(){
            return $this->rfc;
        }
        public function getCorreo(){
            return $this->correo;
        }
        public function getTelefono(){
            return $this->telefono;
        }
        public function getDireccion(){
            return $this->direccion;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApaterno(){
            return $this->apaterno;
        }
        public function getAmaterno(){
            return $this->amaterno;
        }
        public function getCorreoRepre(){
            return $this->correo_repre;
        }
        public function getCelularRepre(){
            return $this->celular_repre;
        }

        public function toString(){
            return $this->nombre . " " . $this->apaterno . " " . $this->amaterno;
        }

    } # fin de la clase





?>