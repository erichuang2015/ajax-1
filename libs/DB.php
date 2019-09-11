<?php

/**
 * Class DB
 */
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

    /**
     * DB constructor: Inicializa invocando su método conect(), el cual devuelve un objeto PDO.
     */
    public function __construct(){
        $this->connect();
    } # fin del constructor


    /**
     * Método que realiza la conexión con la Base de Datos, se ser exitosa devuelve un objeto PDO
     * @return PDO|null
     */
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

    /**
     *  Método que establece como nula la conexión con la Base de Datos, terminando asi su comunicación con ella.
     */
    public function disConn(){
        $this->userConn = null;
    } # fin del metodo

} # fin de la clase


?>