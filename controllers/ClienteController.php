<?php

    class ClienteController extends Controller{

        public function __construct(){
            parent::__construct();
            $this->viewController->titulo = "Clientes";
        } # fin del constructor

        public function render(){
            $this->viewController->render( 'clientes/clientes' );
        } # fin del metodo


        public function nuevoCliente(){
            $this->viewController->render( 'clientes/nuevoCliente' );
            
        } # fin del metodo

        public function insertClient(){
            # Invocar el render para el nuevo cliente
            if( isset( $_POST['sendNewClient'] ) ){
                # Recibir los parametros por POST
                $datos = array(
                    'razon_social'  => $_POST['razonSocial'],
                    'rfc'           => $_POST['rfc'],
                    'direccion'     => $_POST['direccion'],
                    'telefono'      => $_POST['telefono'],
                    'correo'        => $_POST['correo'],
                    'nombre'        => $_POST['nombre_repre'],
                    'apaterno'      => $_POST['apaterno_repre'],
                    'amaterno'      => $_POST['amaterno_repre'],
                    'celular_repre' => $_POST['celular'],
                    'correo_repre'  => $_POST['correo_repre']
                );

                $model = $this->loadModel( __CLASS__ );
                $rs = $model->insertClientModel( $datos );

                if( $rs ){
                    $this->viewController->msjAddCliente = '<p class="text-center alert alert-success">'.$datos['razon_social'].' se ha agregado correctamente como cliente</p>';
                }else{
                    $this->viewController->msjAddCliente = '<p class="alert alert-danger">No se ha podido agregar al cliente</p>';
                    
                }
                $this->viewController->render( 'clientes/nuevoCliente' );
            }
        } # fin del metodo

    } # fin de la clase

?>