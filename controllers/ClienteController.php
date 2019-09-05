<?php

    class ClienteController extends Controller{

        public function __construct(){
            parent::__construct();
            $this->viewController->titulo = "Clientes";
        } # fin del constructor

        public function render(){
            $this->viewController->render( 'clientes/clientes' );
        } # fin del metodo

    } # fin de la clase

?>