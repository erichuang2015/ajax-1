<?php
    require_once 'libs/Cliente.php';
    class ClienteController extends Controller{

        protected $clienteController = array();

        public function __construct(){
            parent::__construct();
            $this->viewController->setTitulo('Clientes');
        } # fin del constructor

        public function render(){
            $this->viewController->clientes = $this->listar();
            $this->viewController->render( 'clientes/clientes' );
        } # fin del metodo


        public function nuevoCliente(){
            $this->viewController->render( 'clientes/nuevoCliente' );
        } # fin del metodo

        public function perfilCliente( $rfc ){
            $model = $this->loadModel( __CLASS__ );
            $rs = $model->selectByRFC( $rfc[0] );
            $clienteController = new Cliente(
                $rs['ID_CLIENTE'],
                $rs['RAZON_SOCIAL'],
                $rs['RFC'],
                $rs['DIRECCION'],
                $rs['TELEFONO'],
                $rs['CORREO'],
                $rs['NOMBRE'],
                $rs['APATERNO'],
                $rs['AMATERNO'],
                $rs['CELULAR_REPRE'],
                $rs['CORREO_REPRE']
            );
            $this->viewController->cliente = $clienteController;
            $this->viewController->render( 'clientes/perfilCliente' );
        } # fin del metodo

        public function findRFC( $rfc ){
            $model = $this->loadModel( __CLASS__ );
            $rs = $model->selectLikeRFC( $rfc[0] );
            $clientes = array();
            if( $rs != null ){
                
                echo $rs;
            }else{
                echo "No hay coincidencia";
            }
            
            
        }

        public function editarCliente( $params ){
            $datos = array(
                'id_cliente'    => $params[0],
                'razon_social'  => $params[1],
                'rfc'           => $params[2],
                'correo'        => $params[3],
                'telefono'      => $params[4],
                'direccion'     => $params[5],
                'nombre'        => $params[6],
                'apaterno'      => $params[7],
                'amaterno'      => $params[8],
                'correo_repre'  => $params[9],
                'celular_repre' => $params[10]
            );
            $this->viewController->clientes = $datos;
            $this->viewController->render( 'clientes/editarCliente' );
        } # fin del metodo

        public function insertClient(){
            # Invocar el render para el nuevo cliente
            if( isset( $_POST['sendNewClient'] ) ){
                # Recibir los parametros por POST
                $datos = array(
                    'razon_social'  => $_POST['razonSocial'],
                    'rfc'           => $_POST['rfc'],
                    'direccion'     => str_replace('#', 'Num. ', $_POST['direccion']),
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

        public function listar(){
            $model = $this->loadModel( __CLASS__ );
            $rs = $model->selectAll();
            return $rs;
        } # fin del metodo

        public function eliminarCliente( $id ){
            $rfc = $id[0];
            $model = $this->loadModel( __CLASS__ );
            $rs = $model->delete( $rfc );
            if( !$rs ){
                echo "<p>Error al eliminar</p>";
            }
            $this->render();
        } # fin del metodo

        public function updateClient(){
            # Invocar el render para el nuevo cliente
            if( isset( $_POST['sendEditClient'] ) ){
                # Recibir los parametros por POST
                $datos = array(
                    'id_cliente'    => $_POST['id_cliente'],
                    'razon_social'  => $_POST['razonSocial'],
                    'rfc'           => $_POST['rfc'],
                    'direccion'     => str_replace('#', 'Num. ', $_POST['direccion']),
                    'telefono'      => $_POST['telefono'],
                    'correo'        => $_POST['correo'],
                    'nombre'        => $_POST['nombre_repre'],
                    'apaterno'      => $_POST['apaterno_repre'],
                    'amaterno'      => $_POST['amaterno_repre'],
                    'celular_repre' => $_POST['celular'],
                    'correo_repre'  => $_POST['correo_repre']
                );

                $model = $this->loadModel( __CLASS__ );
                $rs = $model->updateClientModel( $datos );

                if( $rs ){
                    $this->viewController->clientes = $datos;
                    $this->viewController->msjAddCliente = '<p class="text-center alert alert-success">'.$datos['razon_social'].' se ha actualizado correctamente</p>';
                }else{
                    $this->viewController->msjAddCliente = '<p class="alert alert-danger">No se ha podido actualizar al cliente</p>';
                    
                }
                $this->viewController->render( 'clientes/editarCliente' );
            }
        } # fin del metodo

    } # fin de la clase

?>