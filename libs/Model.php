<?php

    declare(strict_types=1);

/**
 * <b>Class Model</b>:
 * Clase que permite establecer cominicación con la BD, instanciando un objeto de tipo PDO
 */
class Model{

    /** Almacena un objeto BD
     * @var DB
     */
    protected $db;

    /**
     * <b>Model constructor</b>:
     * Instancia la clase DB, devolviendo un objeto PDO
     */
    public function __construct(){
        $this->db = new DB();
    } # fin del constructor



} # fin de la clase


?>