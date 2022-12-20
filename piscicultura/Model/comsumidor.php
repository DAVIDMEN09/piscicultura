<?php
class comsumidor
{
	private $pdo;

    public $ID_Consumidor;
    public $Edad;
    public $Dirección;
    public $Nombre;
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

			$stm = $this->pdo->prepare("SELECT * FROM consumidor");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID_Consumidor)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM consumidor WHERE ID_Consumidor = ?");
			$stm->execute(array($ID_Consumidor));
			
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($ID_Consumidor)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM consumidor WHERE ID_Consumidor = ?");

			$stm->execute(array($ID_Consumidor));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE consumidor SET
						Edad = ?,
						Dirección = ?,
                        Nombre = ?,
						Teléfono = ?
				    WHERE ID_Consumidor = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Edad,
                        $data->Dirección,
                        $data->Nombre,
						$data->Teléfono,
                        $data->ID_Consumidor
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(comsumidor $data)
	{
		try
		{
		$sql = "INSERT INTO consumidor (ID_Consumidor,Edad,Dirección,Nombre,Teléfono)
		        VALUES (?, ?, ?, ?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Consumidor,
                    $data->Edad,
                    $data->Dirección,
                    $data->Nombre,
                    $data->Teléfono
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}
