<?php

require_once 'model/alimentacion.php';
require_once 'model/estanque.php';
require_once 'model/pez.php';
require_once 'model/alimento.php';
class alimentacionController{

    private $model;
    private $modelEs;
    private $modelPe;
    private $modelA;

    
    public function __CONSTRUCT(){
        $this->model = new alimentacion();
        $this->modelEs = new estanque();
        $this->modelPe = new pez();
        $this->modelA = new alimento();
    }

    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alimentacion/alimentacion.php';
        require_once 'view/footer.php';
    }

    
    public function Crud(){
        $pvd = new alimentacion();

        if(isset($_REQUEST['CodAlimentacion'])){
            $pvd = $this->model->Obtener($_REQUEST['CodAlimentacion']);
        }

       
        require_once 'view/header.php';
        require_once 'view/alimento/alimento-editar.php';
        require_once 'view/footer.php';
  }

    public function Nuevo(){
        $pvd = new alimentacion();

        
        require_once 'view/header.php';
        require_once 'view/alimentacion/alimentacion-nuevo.php';
        require_once 'view/footer.php';
    }

    
    public function Guardar(){
        $pvd = new alimentacion();

        
        $pvd->CodAlimentacion = $_REQUEST['CodAlimentacion'];
        $pvd->Fecha_alimentacion = $_REQUEST['Fecha_alimentacion'];
        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->ID_Pez = $_REQUEST['ID_Pez'];
        $pvd->ID_Alimento = $_REQUEST['ID_Alimento'];


        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=alimentacion');
    }

 
    public function Editar(){
        $pvd = new alimentacion();

        $pvd->CodAlimentacion = $_REQUEST['CodAlimentacion'];
        $pvd->Fecha_alimentacion = $_REQUEST['Fecha_alimentacion'];
        $pvd->ID_Estanque = $_REQUEST['ID_Estanque'];
        $pvd->ID_Pez = $_REQUEST['ID_Pez'];
        $pvd->ID_Alimento = $_REQUEST['ID_Alimento'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=alimentacion');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['CodAlimentacion']);
        header('Location: index.php?c=alimentacion');
    }
} ?>