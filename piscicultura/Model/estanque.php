<?php
class estanque
{
	private $pdo;

    public $ID_Estanque;
    public $Profundidad;
    public $Longitud;
    public $Capacidad;

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

	public function ListarEs()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM estanque");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID_Estanque)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM estanque WHERE ID_Estanque = ?");
			$stm->execute(array($ID_Estanque));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($ID_Estanque)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM estanque WHERE ID_Estanque = ?");

			$stm->execute(array($ID_Estanque));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE estanque SET
						Profundidad = ?,
                        Longitud = ?,
						Capacidad = ?
				    WHERE ID_Estanque = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Profundidad,
                        $data->Longitud,
						$data->Capacidad,
                        $data->ID_Estanque
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(estanque $data)
	{
		try
		{
		$sql = "INSERT INTO estanque (ID_Estanque,Profundidad,Longitud,Capacidad)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Estanque,
                    $data->Profundidad,
                    $data->Longitud,
                    $data->Capacidad
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}