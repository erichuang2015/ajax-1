<?php


    class LoginController extends Controller{
        
        #      P R O P I E D A D E S
        # ---------------------------------


        #         M E T O D O S
        # ---------------------------------
        public function __construct(){
            parent::__construct();
            $this->viewController->titulo = "login";   
        } # fin del constructor


        public function render(){
            $this->viewController->render( '/login/login' );
        } # fin del metodo

        public function iniciar(){
            $modeloController;
            /**/
            $correoE = $this->validacionCorreo( $_POST['correo'] );
            $passE = $this->validarPass( $_POST['password'] );
            
            if( ($correoE != false) && ($passE != false) ){
                # iniciar autenticación con la BD
                $datosController = array(
                    'correo'   => $correoE,
                    'password' => $passE
                );

                # Crear el objeto Model
                $modeloController = $this->loadModel( __CLASS__ );

                # Metodo que conecta a la bd
                $rs = $modeloController->iniciarModel( $datosController );
                if( $rs != null ){
                    session_start();
                    $_SESSION['matricula'] = $rs['matricula'];
                    $_SESSION['nombre'] = $rs['nombre'];
                    $_SESSION['apaterno'] = $rs['apaterno'];
                    $_SESSION['amaterno'] = $rs['amaterno'];
                    $_SESSION['rol'] = $rs['rol'];
                    header('location: ../dashboard');
                }else{
                    $this->viewController->errores[2] = '<p class="alert alert-danger">Usuario o contraseña incorrectos.</p>'; 
                    $this->render();
                }
            }else{
                $this->render();
            }
            
            
        } # fin del metodo

        public function validacionCorreo( $correo ){
            if( !empty( $correo ) ){
                $correo = filter_var( $correo, FILTER_VALIDATE_EMAIL );
            }else{
                $this->viewController->errores[0] = '<p class="alert alert-danger">Se require el correo.</p>';
                return false;
            }
            return $correo;
        } # fin del metodo

        public function validarPass( $pass ){
            if( empty( $pass ) ){
                $this->viewController->errores[1] = '<p class="alert alert-danger">Se require la contraseña.</p>';
                return false;
            }else{
                return $pass;
            }
        } # fin del metodo


    } # fin de la clase

?>