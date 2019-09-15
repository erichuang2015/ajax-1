<?php

    declare( strict_types = 1 );

    require_once 'Cliente.php';
    require_once 'ModelDTO/ClienteDTO.php';


    /**
     * <b>Class View</b>: Esta clase permite generar el HTML que el controlador necesite en el momento de la petición,
     * ademas de poder transferirle información mediante propiedades de la misma clase.
     */
    class View{

        /** Establece el titulo de la página web entre las etiquetas <title></title>
         * @var string
         */
        private $titulo;
        /** Almacena los errores que puedan ocurrir en las validaciones sobre los datos enviados por formulario
         * @var array
         */
        public $errores = array();
        /**  @var ClienteDTO
         */
        public $clienteDTO;
        /** Almacena los mensajes de las operaciones CRUD
         * @var string
         */
        public $msjGralCliente = "";

        public $msjRmCliente = "";
        public $clientes = array();
        public $cliente;




        /**
         * @param string $fileView Nombre de la carpeta y vista que se quiere invocar, comprobara si existe en el
         * directorio.
         */
        public function render(string $fileView ):void{
            ( file_exists( PATH_VIS . $fileView . '.php' ) ) ?
                include_once PATH_VIS . $fileView . '.php' :
                "<p>No se pudo renderizar la página, no se encontro el directorio.</p>";
        } # fin del metodo


        /**
         * Establece el nombre del titulo de la página web entre las etiquetas title
         * @param string $titulo
         */
        public function setTitulo(string $titulo ):void{
            $this->titulo = $titulo;
        } # fin del metodo

        /**
         * Devuelve el nombre del titulo de la página web.
         * @return string
         */
        public function getTitulo():string{
            return $this->titulo;
        }

        /**
         * Define el objeto ClienteDTO pasado como parámetro a la propiedad clienteDTO de <b>View</b>
         * @param ClienteDTO $cliente
         */
        public function setClienteDTO(ClienteDTO $cliente ) : void{
            $this->clienteDTO = $cliente;
        }

    } # fin de la clase

?>