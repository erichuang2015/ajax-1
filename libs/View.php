<?php



    class View{
        
        #      P R O P I E D A D E S
        # ---------------------------------
        public $titulo;
        public $errores = array();

        #         M E T O D O S
        # ---------------------------------
        public function render( $nombreVista ){
            if( file_exists( PATH_VIS . $nombreVista . ".php" ) ){
                include_once PATH_VIS . $nombreVista . ".php";
            }
        } # fin del metodo

    } # fin de la clase

?>