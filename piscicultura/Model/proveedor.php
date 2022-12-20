<?php
class proveedor
{
	private $pdo;

    public $ID_Proveedor;
    public $Correo;
    public $Nombre;
    public $Dirección;
    public $Teléfono;

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

			$stm = $this->pdo->prepare("SELECT * FROM proveedor");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID_Proveedor)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM proveedor WHERE ID_Proveedor = ?");
			$stm->execute(array($ID_Proveedor));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($ID_Proveedor)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM proveedor WHERE ID_Proveedor = ?");

			$stm->execute(array($ID_Proveedor));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE proveedor SET
						Correo = ?,
						Nombre = ?,
                        Dirección = ?,
						Teléfono = ?
				    WHERE ID_Proveedor = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Correo,
                        $data->Nombre,
                        $data->Dirección,
						$data->Teléfono,
                        $data->ID_Proveedor
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
		$sql = "INSERT INTO alimento (ID_Proveedor,Correo,Nombre,Dirección,Teléfono)
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Proveedor,
                    $data->Correo,
                    $data->Nombre,
                    $data->Dirección,
                    $data->Teléfono
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}