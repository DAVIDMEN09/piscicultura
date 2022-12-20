<?php

require_once 'model/empleado.php';

class empleadoController{

    private $model;
    

   
    public function __CONSTRUCT(){
        $this->model = new empleado();
    }

    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/empleado/empleado.php';
        require_once 'view/footer.php';
    }

    
    public function Crud(){
        $pvd = new empleado();

        
        if(isset($_REQUEST['ID_Empleado'])){
            $pvd = $this->model->Obtener($_REQUEST['ID_Empleado']);
        }

        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-editar.php';
        require_once 'view/footer.php';
  }

    
    public function Nuevo(){
        $pvd = new empleado();

        
        require_once 'view/header.php';
        require_once 'view/empleado/empleado-nuevo.php';
        require_once 'view/footer.php';
    }

   
    public function Guardar(){
        $pvd = new empleado();

        
        $pvd->ID_Empleado = $_REQUEST['ID_Empleado'];
        $pvd->Area = $_REQUEST['Area'];
        $pvd->Edad = $_REQUEST['Edad'];
        $pvd->Telefono = $_REQUEST['Telefono'];
        $pvd->Dirección = $_REQUEST['Dirección'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Sexo = $_REQUEST['Sexo'];

       
        $this->model->Registrar($pvd);

        
        header('Location: index.php?c=empleado');
    }

   
    public function Editar(){
        $pvd = new empleado();

        $pvd->ID_Empleado = $_REQUEST['ID_Empleado'];
        $pvd->Area = $_REQUEST['Area'];
        $pvd->Edad = $_REQUEST['Edad'];
        $pvd->Telefono = $_REQUEST['Telefono'];
        $pvd->Dirección = $_REQUEST['Dirección'];
        $pvd->Nombre = $_REQUEST['Nombre'];
        $pvd->Sexo = $_REQUEST['Sexo'];

        $this->model->Actualizar($pvd);

        header('Location: index.php?c=empleado');
    }

    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Empleado']);
        header('Location: index.php?c=empleado');
    }
    

    public function login(){
        $emp=new empleado();
        $emp->email=$_REQUEST['email'];
        $emp->email=$_REQUEST['pwd'];
        $this->model->login($emp);
        $session=$_SESSION['email'];
        if ($session) {
            header('Location: index.php?c=empleado');
        }
        else {
            header('Location: index.php?c=compra');

        }
    }
}
