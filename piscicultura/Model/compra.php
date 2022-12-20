<?php
class compra
{
	private $pdo;
    public $ID_Compra;
    public $Fecha_Compra;
    public $Precio;
    public $Cantidad_kg;
    public $Total_Compra;
    public $ID_Pez;
    public $ID_Estanque;
    public $ID_Consumidor;
    public $ID_Empleado;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::Conectar();
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM compra");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	
	public function ListarHistorial()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM  historialcom");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Obtener($ID_Compra)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM compra WHERE ID_Compra = ?");
			$stm->execute(array($ID_Compra));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function mejor()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT mejor_cliente()");
			$stm->execute();
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Eliminar($ID_Compra)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM compra WHERE ID_Compra = ?");

			$stm->execute(array($ID_Compra));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function recuperar($ID_Compra)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM historialcom WHERE ID_Compra = ?");

			$stm->execute(array($ID_Compra));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}



	
	public function Registrar(compra $data)
	{
		try
		{
		$sql = "INSERT INTO compra (ID_Compra,Fecha_Compra,Precio,Cantidad_kg,Total_Compra,ID_Pez,ID_Estanque,ID_Consumidor,ID_Empleado)
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Compra,
                    $data->Fecha_Compra,
                    $data->Precio,
                    $data->Cantidad_kg,
                    $data->Total_Compra,
                    $data->ID_Pez,
                    $data->ID_Estanque,
                    $data->ID_Consumidor,
                    $data->ID_Empleado
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}