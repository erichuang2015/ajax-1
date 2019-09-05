<?php


    class Controller{

        #      P R O P I E D A D E S
        # ---------------------------------
        protected $viewController;

        #         M E T O D O S
        # ---------------------------------
        public function __construct(){
            $this->viewController = new View();
        }

        
    } # fin de la clase


?>