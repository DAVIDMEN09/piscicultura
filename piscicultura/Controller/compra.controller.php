<?php

require_once 'model/compra.php';
require_once 'model/estanque.php';
require_once 'model/pez.php';
require_once 'model/empleado.php';
require_once 'model/comsumidor.php';
class compraController{

    private $model;
    private $modelEs;
    private $modelPe;
    private $modelEm;
    private $modelCon;


    public function __CONSTRUCT(){
        $this->model = new compra();
        $this->modelEs = new estanque();
        $this->modelPe = new pez();
        $this->modelEm = new empleado();
        $this->modelCon = new comsumidor();
    }

   
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/compra/compra.php';
        require_once 'view/footer.php';
    }

    public function historial(){
        require_once 'view/header.php';
        require_once 'view/compra/historial.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new compra();

        if(isset($_REQUEST['ID_Compra'])){
            $prod = $this->model->Obtener($_REQUEST['ID_Compra']);
        }

        require_once 'view/header.php';
        require_once 'view/compra/compra-editar.php';
        require_once 'view/footer.php';
    }

    
    public function Nuevo(){
        $pvd = new compra();

     
        require_once 'view/header.php';
        require_once 'view/compra/compra-nuevo.php';
        require_once 'view/footer.php';
    }

    
    public function Guardar(){
        $pvd = new compra();

        $pvd->ID_Compra = $_REQUEST['ID_Compra'];
        $pvd->Fecha_Compra = $_REQUEST['Fecha_Compra'];
        $pvd->Precio = $_REQUEST['Precio'];
        $pvd->Cantidad_kg = $_REQUEST['Cantidad_kg'];
        $pvd->Total_Compra = $_REQUEST['Cantidad_kg'] * $_REQUEST['Precio'];
        $pvd->ID_Pez = $_REQUEST['ID_Pez'];
        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->ID_Consumidor = $_REQUEST['ID_Consumidor'];
        $pvd->ID_Empleado = $_REQUEST['ID_Empleado'];


        $this->model->Registrar($pvd);

       
        header('Location: index.php?c=compra');
    }

    
   

    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Compra']);
        header('Location: index.php?c=compra');
    }

    public function recuperar(){
        $this->model->recuperar($_REQUEST['ID_Compra']);
        header('Location: index.php?c=compra');
    }
} 