<?php


    class ErrorController extends Controller{

        public function __construct(){
            parent::__construct();
            $this->viewController->titulo = "Error";
        } # fin del constructor

        public function render(){
            $this->viewController->render('error/error');
        } # fin del metodo

    } # fin de la clase

?>