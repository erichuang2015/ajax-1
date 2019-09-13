<?php

require_once 'libs/Cliente.php';
require_once 'ModelDTO/ClienteDTO.php';


/**
 * <b>Class ClienteController</b>
 * Esta clase permite gestionar las peticiónes del usuario (HTTP), invocando el controlador correspondiente al modulo
 * de clientes, asi como las acciones CRUD.
 * @author Juan Manuel Cruz Badillo.
 * @version v1.1.0
 */
class ClienteController extends Controller{

    protected $clienteController = array();


    /**
     * ClienteController constructor.
     * Inicializa el constructor padre que retorna un objeto de tipo <b>View</b> que permite tener los metodos del obj
     * ademas de establecer el nombre del titulo de la página.
     */
    public function __construct(){
        parent::__construct();
        $this->viewController->setTitulo('Clientes');
    } # fin del constructor


    /**
     * render(): Genera el código HTML necesario que se le pasa como argumento, ademas de cargar la lista de
     * clientes mediante el metodo listarTodos
     */
    public function render() : void{
        $this->viewController->clientes = $this->listar();
        $this->viewController->render( 'clientes/clientes' );
    } # fin del metodo


    /**
     * <b>nuevoCliente()</b>: Genera el código HTML para visualizar la plantilla para agregar a un nuevo cliente.
     */
    public function nuevoCliente() : void{
        $this->viewController->render( 'clientes/nuevoCliente' );
    } # fin del metodo

    /**
     * <b>perfilCliente()</b>: Genera el código HTML para visualizar la plantilla y mostrar el perfil de un cliente.
     */
    public function perfilCliente( $rfc ) : void{
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


    /**
     * <b>insertarCliente():</b>
     * Este método recibe los parametros envidos por POST del fomulario, los valida y crea un objeto ClienteDTO para
     * agregarlo a la base de datos de la tabla cliente.
     */
    public function insertarCliente() : void{
        if( isset( $_POST['sendNewClient'] ) ){
            # Recibimos los parametros por POST
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

            # Creamos un objeto de tipo ClienteDTO
            $cliente = new ClienteDTO();

            $cliente->setRazonSocial($datos['razon_social']);
            $cliente->setRfc($datos['rfc']);
            $cliente->setDireccion($datos['direccion']);
            $cliente->setTelefono($datos['telefono']);
            $cliente->setCorreo($datos['correo']);
            $cliente->setNombre($datos['nombre']);
            $cliente->setApaterno($datos['apaterno']);
            $cliente->setAmaterno($datos['amaterno']);
            $cliente->setCelularRepre($datos['celular_repre']);
            $cliente->setCorreoRepre($datos['correo_repre']);

            # Realizamos la inserción a la BD
            $this->viewController->msjAddCliente = ( $model->insertarClienteModel( $cliente ) ) ?
                '<p class="text-center alert alert-success">'.
                $cliente->getRazonSocial().' se ha agregado correctamente como cliente</p>' :
                '<p class="alert alert-danger">No se ha podido agregar al cliente</p>';

            # Invocamos render
            $this->viewController->render( 'clientes/nuevoCliente' );
        }
    } # fin del metodo

    /**
     * Método que retorna una lista de todos los clientes en el que su RFC sea parecida la que se le pasa por parametro,
     * e imprime la lista como JSON (string)
     * @param array $rfc
     */
    public function buscarRFC( $rfc ) : void{
        # Creamos un obj Cliente
        $cliente = new ClienteDTO();
        $cliente->setRfc( $rfc[0] );

        # Creamos un modelo para interactuar con la BD
        $model = $this->loadModel( __CLASS__ );

        # Retornara un string (JSON)
        $personas = $model->rfcParecido( $cliente );

        # Imprimimos
        echo ( $personas != null ) ? $personas : "No hay coincidencias";
    } # fin del metodo


    /**
     * <b>editarCliente</b>: Genera el código HTML para visualizar la plantilla para editar a un nuevo cliente,
     * mostrando los valores que se le han pasado como parámetro.
     * @param array $params
     */
    public function editarCliente($params ) : void{
        # Creamos un objeto ClienteDTO y establecemos sus propiedades
        $cliente = new ClienteDTO();
        $cliente->setIdCliente($params[0]);
        $cliente->setRazonSocial($params[1]);
        $cliente->setRfc($params[2]);
        $cliente->setDireccion($params[5]);
        $cliente->setTelefono($params[4]);
        $cliente->setCorreo($params[3]);
        $cliente->setNombre($params[6]);
        $cliente->setApaterno($params[7]);
        $cliente->setAmaterno($params[8]);
        $cliente->setCelularRepre($params[10]);
        $cliente->setCorreoRepre($params[9]);

        # Asignamos el objeto a la vista, para que pueda visualizar sus valores
        $this->viewController->setClienteDTO( $cliente );
        $this->viewController->render( 'clientes/editarCliente' );
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