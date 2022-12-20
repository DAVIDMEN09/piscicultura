<?php
class alimentacion
{
	private $pdo;
    public $CodAlimentacion;
    public $Fecha_alimentacion;
    public $ID_Estanque;
    public $ID_Pez;
    public $ID_Alimento;

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

			$stm = $this->pdo->prepare("SELECT * FROM alimentación");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($CodAlimentacion)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM alimentación WHERE ID_Alimento = ?");
			$stm->execute(array($CodAlimentacion));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($CodAlimentacion)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alimentación WHERE ID_Alimento = ?");

			$stm->execute(array($CodAlimentacion));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE alimentación SET
						Fecha_alimentacion = ?,
						ID_Estanque = ?,
                        ID_Pez  = ?,
						ID_Alimento  = ?
				    WHERE CodAlimentacion = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Fecha_alimentacion,
                        $data->ID_Estanque,
                        $data->ID_Pez,
						$data->ID_Alimento ,
                        $data->CodAlimentacion
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(alimentacion $data)
	{
		try
		{
		$sql = "INSERT INTO alimento (CodAlimentacion,Fecha_alimentacion,ID_Estanque,ID_Pez,ID_Alimento)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->CodAlimentacion,
                    $data->Fecha_alimentacion,
                    $data->ID_Estanque,
                    $data->ID_Pez,
                    $data->ID_Alimento
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}