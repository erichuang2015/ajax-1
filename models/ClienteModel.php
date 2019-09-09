<?php



    class ClienteModel extends Model{

        public function __construct(){
            parent::__construct();
        } # fin del constructor

        public function insertClientModel( $datos ){
            $llaves = array_keys( $datos );
            try {
                $query = "insert into cliente (".implode(', ',$llaves).") values (:".implode(', :', $llaves).")";
                $db = $this->db->connect()->prepare( $query );
                $stmt = $db->execute( $datos );
                return $stmt;
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }

        } # fin del metodo

        public function updateClientModel( $datos ){
            $llaves = array_keys( $datos );
            try {
                $query = "update cliente set razon_social=:razon_social, rfc=:rfc, direccion=:direccion, telefono=:telefono, correo=:correo, nombre=:nombre, apaterno=:apaterno, amaterno=:amaterno, celular_repre=:celular_repre, correo_repre=:correo_repre where id_cliente=:id_cliente";
                $db = $this->db->connect()->prepare( $query );
                $stmt = $db->execute( [
                    ':razon_social' => $datos['razon_social'],
                    ':rfc' => $datos['rfc'],
                    ':direccion' => $datos['direccion'],
                    ':telefono' => $datos['telefono'],
                    ':correo' => $datos['correo'],
                    ':nombre' => $datos['nombre'],
                    ':apaterno' => $datos['apaterno'],
                    ':amaterno' => $datos['amaterno'],
                    ':celular_repre' => $datos['celular_repre'],
                    ':correo_repre' => $datos['correo_repre'],
                    ':id_cliente' => $datos['id_cliente']
                ] );
                return $stmt;
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }

        } # fin del metodo

        public function selectAll(){
            $record = array();
            try {
                $query = "select * from cliente";
                $db = $this->db->connect();
                $rs = $db->query($query);
                
                    
                return $rs->fetchAll();
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }
        } # fin del metodo

        public function selectByRFC( $rfc ){
            try {
                $query = "select * from cliente where rfc=:rfc";
                $db = $this->db->connect();
                $rs = $db->prepare($query);
                $rs->execute([
                    ':rfc'=>$rfc
                ]);
                    
                return $rs->fetch();
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }
        }# fin del metodo

        public function delete( $rfc ){
            try {
                $query = "delete from cliente where rfc=:rfc";
                $db = $this->db->connect()->prepare( $query );
                $rs = $db->execute([
                    ':rfc' => $rfc
                ]);
                
                    
                return $rs;
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }
        } # fin del metodo

    } # fin de la clase

?>