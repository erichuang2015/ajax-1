<?php

    class LoginModel extends Model{

        public function __construct(){
            parent::__construct();
        } # fin del constructor


        public function iniciarModel( $datos ){
            try {
                $query = "select u.matricula, u.nombre, u.apaterno, u.amaterno, u.correo, u.rfc, u.password, r.nombre as rol
                from usuario u inner join rol r on u.id_rol=r.id_rol where correo=:correo and password=:password";
                $con = $this->db->connect()->prepare( $query );
                $con->execute([
                    ':correo' => $datos['correo'],
                    ':password' => $datos['password']
                ]);
                return $con->fetch();
            } catch (PDOException $e) {
                echo "<p>Error en la consulta: </p>" . $e->getMessage();
            }
        } # fin del metodo

    } # fin del metodo

?>