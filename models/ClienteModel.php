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

        public function selectAll(){
            $record = array();
            try {
                $query = "select id_cliente, razon_social, rfc, correo, nombre from cliente";
                $db = $this->db->connect();
                $rs = $db->query($query);
                
                    
                return $rs->fetchAll();
            } catch (PDOException $e) {
                echo "<p>Error no se pudo agregar al nuevo cliente debido a: </p>".$e->getMessage();
            }
        } # fin del metodo

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