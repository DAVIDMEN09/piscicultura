<?php
require_once 'model/comsumidor.php';

class comsumidorController{

    private $model;

    public function __CONSTRUCT(){
        $this->model = new comsumidor();
    }

 
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/comsumidor/comsumidor.php';
        require_once 'view/footer.php';
    }

    public function Crud(){
        $prod = new comsumidor();

        if(isset($_REQUEST['ID_Consumidor'])){
            $prod = $this->model->Obtener($_REQUEST['ID_Consumidor']);
        }

        require_once 'view/header.php';
        require_once 'view/comsumidor/comsumidor-editar.php';
        require_once 'view/footer.php';
    }

    public function Nuevo(){
        $prod = new comsumidor();

        require_once 'view/header.php';
        require_once 'view/comsumidor/comsumidor-nuevo.php';
        require_once 'view/footer.php';
    }

    public function Guardar(){
        $prod = new comsumidor();

        $prod->ID_Consumidor = $_REQUEST['ID_Consumidor'];
        $prod->Edad = $_REQUEST['Edad'];
        $prod->Dirección = $_REQUEST['Dirección'];
        $prod->Nombre = $_REQUEST['Nombre'];
        $prod->Teléfono = $_REQUEST['Teléfono'];

        $this->model->Registrar($prod);

        header('Location: index.php?c=comsumidor');
    }

    public function Editar(){
        $prod = new comsumidor();

        $prod->ID_Consumidor = $_REQUEST['ID_Consumidor'];
        $prod->Edad = $_REQUEST['Edad'];
        $prod->Dirección = $_REQUEST['Dirección'];
        $prod->Nombre = $_REQUEST['Nombre'];
        $prod->Teléfono = $_REQUEST['Teléfono'];

        $this->model->Actualizar($prod);

        header('Location: index.php?c=comsumidor');
    }

    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['ID_Consumidor']);
        header('Location: index.php?c=comsumidor');
    }
}
