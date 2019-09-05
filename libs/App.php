<?php

    class App{

        #      P R O P I E D A D E S
        # ---------------------------------
        private $url;
        private $controlador;
        private $metodo;
        private $parametro;


        #         M E T O D O S
        # ---------------------------------
        public function __construct(){
            $urlComponentes;
            
            # Obtenemos la url solicitada
            $this->url = (!empty($_GET['url'])) ? filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL) : 'login';

            # Descomponemos el url
            $this->url = explode( '/', $this->url );

            # Obtener el objeto controller
            $controller = $this->validarURL( $this->url[0] );

            # Obtenemos el metodo y le asignamos nulo si no existe
            $method = (isset($this->url[1])) ? $this->url[1] : null;

            # Hay metodo ?
            if( !empty($method) ){ # si hay metodo, evaluar sus parametros 
                # Hay parametros?
                if( !empty( $this->url[2] ) ){
                    # Procesar los parametros
                    $params = array();
                    for( $i = 2; $i < count($this->url); $i++ ){
                        array_push( $params, $this->url[$i] );
                    }
                    $controller->$method( $params );
                }else{
                    $controller->$method();
                }
            }else{
                $controller->render();
                # echo "<p>no se invoco metodo se ejecutara RENDER</p>";
            }

        } # fin del constructor

        public function validarURL( $control ){
            $control = ucwords($control) . "Controller";
            $controller = null;
            if( file_exists( PATH_CON . $control . ".php" ) ){
                require_once PATH_CON . $control . ".php";
                $controller = new $control();
            }else{
                require_once PATH_CON . "ErrorController.php";
                $controller = new ErrorController();
            }
            return $controller;
        } # fin del metodo





    } # fin de la clase



?>