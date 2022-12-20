<?php
class mantenimiento
{
	private $pdo;

    public $codManteni;
    public $Fecha_Mantenimiento;
    public $ID_Empleado;
    public $ID_Estanque;
    public $ID_Pez;

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

			$stm = $this->pdo->prepare("SELECT * FROM mantiene");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}


	// public function Buscar($codManteni)
	// {
	// 	try
	// 	{
	// 		$result = array();

	// 		$stm = $this->pdo->prepare("SELECT * FROM mantiene WHERE codManteni = ?");
	// 		$stm->execute();

	// 		return $stm->fetchAll(PDO::FETCH_OBJ);
	// 	}
	// 	catch(Exception $e)
	// 	{
	// 		die($e->getMessage());
	// 	}
	// }

	public function Buscar($codManteni)
	{
		try
		{
			$stm = $this->pdo->prepare("CALL BuscadorDatos (?);");
			$stm->execute(array($codManteni));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}


	public function Obtener($codManteni)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM mantiene WHERE codManteni = ?");
			$stm->execute(array($codManteni));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($codManteni)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM mantiene WHERE codManteni = ?");

			$stm->execute(array($codManteni));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE mantiene SET
						Fecha_Mantenimiento = ?,
						ID_Empleado = ?,
                        ID_Estanque = ?,
						ID_Pez = ?
				    WHERE codManteni = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Fecha_Mantenimiento,
                        $data->ID_Empleado,
                        $data->ID_Estanque,
						$data->ID_Pez,
                        $data->codManteni
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(mantenimiento $data)
	{
		try
		{
		$sql = "INSERT INTO mantiene (codManteni,Fecha_Mantenimiento,ID_Empleado,ID_Estanque,ID_Pez)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->codManteni,
                    $data->Fecha_Mantenimiento,
                    $data->ID_Empleado,
                    $data->ID_Estanque,
                    $data->ID_Pez
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}