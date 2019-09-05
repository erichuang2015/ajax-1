<?php

    class DB{
        #      P R O P I E D A D E S
        # ---------------------------------
        private $driver   = DRIVER;
        private $host     = HOST;
        private $db       = DB;
        private $user     = USER;
        private $password = PASSWORD;
        private $userConn = null;


        #         M E T O D O S
        # ---------------------------------
        public function __construct(){
            $this->connect();
        } # fin del constructor

        public function connect(){
            $dns = "";
            try {
                #dns = mysql:host=localhost; dbname=phptest
                $dns = $this->driver . ":host=".$this->host . "; dbname=".$this->db;
                $option = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];
                $this->userConn = new PDO( $dns, $this->user, $this->password, $option );

                return $this->userConn;
            } catch (PDOException $e) {
                echo "<p>Error de conexion debido a: <p>" . $e->getMessage();
            }
        } # fin del metodo

        public function disConn(){
            $this->userConn = null;
        } # fin del metodo

    } # fin de la clase


?>