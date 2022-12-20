<?php
//Se incluye el modelo donde conectará el controlador. .....copy
require_once 'model/pez.php';

class pezController{

    private $model;

    
    public function __CONSTRUCT(){
        $this->model = new pez();
    }

    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/pez/pez.php';
        require_once 'view/footer.php';
    }

    
    public function Crud(){
        $pvd = new pez();


        if(isset($_REQUEST['ID_Pez'])){
            $pvd = $this->model->Obtener($_REQUEST['ID_Pez']);
        }

        //Llamado de las vistas.
        require_once 'view/header.php';
        require_once 'view/pez/pez-editar.php';
        require_once 'view/footer.php';
  }

    public function Nuevo(){
        $pvd = new pez();

       
        require_once 'view/header.php';
        require_once 'view/pez/pez-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $pvd = new pez();

        $pvd->ID_Pez = $_REQUEST['ID_Pez'];
        $pvd->Peso = $_REQUEST['Peso'];
        $pvd->Tipo = $_REQUEST['Tipo'];
        $pvd->Talla = $_REQUEST['Talla'];

        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=pez');
    }

    
    public function Editar(){
        $pvd = new pez();

        $pvd->ID_Pez = $_REQUEST['ID_Pez'];
        $pvd->Peso = $_REQUEST['Peso'];
        $pvd->Tipo = $_REQUEST['Tipo'];
        $pvd->Talla = $_REQUEST['Talla'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=pez');
    }


    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Pez']);
        header('Location: index.php?c=pez');
    }
}