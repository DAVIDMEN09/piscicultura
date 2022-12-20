<?php
class alimento
{
	private $pdo;

    public $ID_Alimento;
    public $Nombre;
    public $Tipo;
    public $Etapa;
    public $ID_Proveedor;

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

	public function ListarA()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alimento");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID_Alimento)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM alimento WHERE ID_Alimento = ?");
			$stm->execute(array($ID_Alimento));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($ID_Alimento)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM alimento WHERE ID_Alimento = ?");

			$stm->execute(array($ID_Alimento));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE alimento SET
						Nombre = ?,
						Tipo = ?,
                        Etapa = ?,
						ID_Proveedor = ?
				    WHERE ID_Alimento = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Nombre,
                        $data->Tipo,
                        $data->Etapa,
						$data->ID_Proveedor,
                        $data->ID_Alimento
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(alimento $data)
	{
		try
		{
		$sql = "INSERT INTO alimento (ID_Alimento,Nombre,Tipo,Etapa,ID_Proveedor)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Alimento,
                    $data->Nombre,
                    $data->Tipo,
                    $data->Etapa,
                    $data->ID_Proveedor
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}