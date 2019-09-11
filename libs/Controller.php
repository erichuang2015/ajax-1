<?php
    declare( strict_types = 1 );

    /**
     * Class Controller: Clase padre que permite interactuar con la clase View para obtener las vistas,
     * ademas de pre cargar la clase Model para interactuar con la Base de datos.
     */
    class Controller{


        /**
         * @var View Almacena un objeto de tipo View, para obtener los metodos del mismo.
         */
        protected $viewController;


        /**
         * Controller constructor. Instancia la clase View mediante la propiedad $viewController
         */
        public function __construct(  ){
            $this->viewController = new View();
        } # fin del método


        /**
         * Método que instancia la clase Model del controlador correspondiente y devuelve el objeto ModelController
         * @param string $fileModel
         * @return Model|null
         */
        public function loadModel(string $fileModel ):Model{
            $modelName = str_replace( 'Controller', 'Model', $fileModel );
            $model = null;
            if( file_exists( PATH_MOD . $modelName . '.php' ) ){
                require_once PATH_MOD . str_replace( 'Controller', 'Model', $fileModel ) . '.php';
                # instanciamos la clase Model
                $model = new $modelName();
            }else{
                return $model = "<p>El modelo {$modelName} no se pudo encontrar</p>";
            }
            return $model;
        } # fin del método

    } # fin de la clase


?>


