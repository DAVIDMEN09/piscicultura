<?php
//Se incluye el modelo donde conectará el controlador. .....copy
require_once 'model/mantenimiento.php';
require_once 'model/empleado.php';
require_once 'model/estanque.php';
require_once 'model/pez.php';

class mantenimientoController{

    private $model;
    private $modeloEm;
    private $modeloEs;
    private $modeloP;



    //Creación del modelo
    public function __CONSTRUCT(){
        $this->model = new mantenimiento();
        $this->modeloEm = new empleado();
        $this->modeloEs = new estanque();
        $this->modeloP = new pez();
    }

 
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/mantenimiento/mantenimiento.php';
        require_once 'view/footer.php';
    }


    public function Crud(){
        $pvd = new mantenimiento();

        if(isset($_REQUEST['codManteni'])){
            $pvd = $this->model->Obtener($_REQUEST['codManteni']);
        }

        //Llamado de las vistas.
        require_once 'view/header.php';
        require_once 'view/mantenimiento/mantenimiento-editar.php';
        require_once 'view/footer.php';
  }

    
    public function Nuevo(){
        $pvd = new mantenimiento();

        
        require_once 'view/header.php';
        require_once 'view/mantenimiento/mantenimiento-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pvd = new mantenimiento();

        $pvd->codManteni = $_REQUEST['codManteni'];
        $pvd->Fecha_Mantenimiento = $_REQUEST['Fecha_Mantenimiento'];
        $pvd->ID_Empleado = $_REQUEST['ID_Empleado'];
        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->ID_Pez = $_REQUEST['ID_Pez'];


        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=mantenimiento');
    }

       public function Eliminar(){
        $this->model->Eliminar($_REQUEST['codManteni']);
        header('Location: index.php?c=mantenimiento');
    }
}