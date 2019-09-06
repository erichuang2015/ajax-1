<?php


    class Controller{

        #      P R O P I E D A D E S
        # ---------------------------------
        protected $viewController;

        #         M E T O D O S
        # ---------------------------------
        public function __construct(){
            $this->viewController = new View();
        } # fin del constructor


        public function loadModel( $modelo ){
            $modelo = str_replace( 'Controller', 'Model', $modelo );
            $model = null;
            if( file_exists( PATH_MOD . $modelo . ".php" ) ){
                require_once PATH_MOD . $modelo . ".php";
                $model = new $modelo();
            }else{
                $model = "<p>No se encontro el modelo</p>";
            }
            return $model;
        } # fin del metodo

        
    } # fin de la clase


?>