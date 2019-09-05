<?php

    class DashboardController extends Controller{

        public function __construct(){
            parent::__construct();
            $this->viewController->titulo = "Dashboard";
        } # fin del constructor

        public function render(){
            $this->viewController->render( 'dashboard/dashboard' );
        } # fin del metodo

    } # fin de la clase

?>