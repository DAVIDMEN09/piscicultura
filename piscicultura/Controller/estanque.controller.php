<?php

require_once 'model/estanque.php';
class estanqueController{

    private $model;

    
    public function __CONSTRUCT(){
        $this->model = new estanque();
    }

    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/estanque/estanque.php';
        require_once 'view/footer.php';
    }

 
    public function Crud(){
        $pvd = new estanque();

    
        if(isset($_REQUEST['ID_Proveedor'])){
            $pvd = $this->model->Obtener($_REQUEST['ID_Proveedor']);
        }

        require_once 'view/header.php';
        require_once 'view/estanque/estanque-editar.php';
        require_once 'view/footer.php';
  }

    public function Nuevo(){
        $pvd = new estanque();

    
        require_once 'view/header.php';
        require_once 'view/estanque/estanque-nuevo.php';
        require_once 'view/footer.php';
    }

  
    public function Guardar(){
        $pvd = new estanque();

        
        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->Profundidad = $_REQUEST['Profundidad'];
        $pvd->Longitud = $_REQUEST['Longitud'];
        $pvd->Capacidad = $_REQUEST['Capacidad'];


        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=estanque');
    }

    //Método que modifica el modelo de un proveedor.
    public function Editar(){
        $pvd = new estanque();

        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->Profundidad = $_REQUEST['Profundidad'];
        $pvd->Longitud = $_REQUEST['Longitud'];
        $pvd->Capacidad = $_REQUEST['Capacidad'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=estanque');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Estanque']);
        header('Location: index.php?c=estanque');
    }
}