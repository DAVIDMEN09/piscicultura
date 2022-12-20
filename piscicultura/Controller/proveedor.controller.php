<?php
//Se incluye el modelo donde conectará el controlador. .....copy
require_once 'model/proveedor.php';
class proveedorController{

    private $model;

    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new proveedor();
    }

    //Llamado plantilla principal
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor.php';
        require_once 'view/footer.php';
    }

    //Llamado a la vista proveedor-editar
    public function Crud(){
        $pvd = new proveedor();

        //Se obtienen los datos del proveedor a editar.
        if(isset($_REQUEST['ID_Proveedor'])){
            $pvd = $this->model->Obtener($_REQUEST['ID_Proveedor']);
        }

        //Llamado de las vistas.
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor-editar.php';
        require_once 'view/footer.php';
  }

    //Llamado a la vista proveedor-nuevo
    public function Nuevo(){
        $pvd = new proveedor();

        //Llamado de las vistas.
        require_once 'view/header.php';
        require_once 'view/proveedor/proveedor-nuevo.php';
        require_once 'view/footer.php';
    }

    //Método que registrar al modelo un nuevo proveedor.
    public function Guardar(){
        $pvd = new proveedor();

        //Captura de los datos del formulario (vista).
        $pvd->ID_Proveedor = $_REQUEST['ID_Proveedor'];
        $pvd->Correo = $_REQUEST['Correo'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Dirección = $_REQUEST['Dirección'];
        $pvd->Teléfono = $_REQUEST['Teléfono'];


        //Registro al modelo proveedor.
        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=proveedor');
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new proveedor();

        $pvd->ID_Proveedor = $_REQUEST['ID_Proveedor'];
        $pvd->Correo = $_REQUEST['Correo'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Dirección = $_REQUEST['Dirección'];
        $pvd->Teléfono = $_REQUEST['Teléfono'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=proveedor');
    }

    //Método que elimina la tupla proveedor con el nit dado.
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Proveedor']);
        header('Location: index.php?c=proveedor');
    }
}