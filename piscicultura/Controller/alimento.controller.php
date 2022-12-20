<?php

require_once 'model/alimento.php';
require_once 'model/proveedor.php';
class alimentoController{

    private $model;
    private $modelo;

   
    public function __CONSTRUCT(){
        $this->model = new alimento();
        $this->modelo = new proveedor();
    }

 
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alimento/alimento.php';
        require_once 'view/footer.php';
    }

    
    public function Crud(){
        $pvd = new alimento();

        
        if(isset($_REQUEST['ID_Alimento'])){
            $pvd = $this->model->Obtener($_REQUEST['ID_Alimento']);
        }

      
        require_once 'view/header.php';
        require_once 'view/alimento/alimento-editar.php';
        require_once 'view/footer.php';
  }

 
    public function Nuevo(){
        $pvd = new alimento();

      
        require_once 'view/header.php';
        require_once 'view/alimento/alimento-nuevo.php';
        require_once 'view/footer.php';
    }

    
    public function Guardar(){
        $pvd = new alimento();

        
        $pvd->ID_Alimento = $_REQUEST['ID_Alimento'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Tipo = $_REQUEST['Tipo'];
        $pvd->Etapa = $_REQUEST['Etapa'];
        $pvd->ID_Proveedor = $_REQUEST['ID_Consumidor'];


       
        $this->model->Registrar($pvd);

       
        header('Location: index.php?c=alimento');
    }

    public function Editar(){
        $pvd = new alimento();

        $pvd->ID_Alimento = $_REQUEST['ID_Alimento'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Tipo = $_REQUEST['Tipo'];
        $pvd->Etapa = $_REQUEST['Etapa'];
        $pvd->ID_Proveedor = $_REQUEST['ID_Proveedor'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=alimento');
    }

  
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Alimento']);
        header('Location: index.php?c=alimento');
    }
}