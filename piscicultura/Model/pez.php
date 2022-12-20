<?php
class pez
{
	private $pdo;

    public $ID_Pez;
    public $Peso;
    public $Tipo;
    public $Talla;

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

	public function ListarP()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM pez");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($ID_Pez)
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM pez WHERE ID_Pez = ?");
			$stm->execute(array($ID_Pez));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($ID_Pez)
	{
		try
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM pez WHERE ID_Pez = ?");

			$stm->execute(array($ID_Pez));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try
		{
			$sql = "UPDATE pez SET
						Peso = ?,
						Tipo = ?,
                        Talla  = ?
				    WHERE ID_Pez = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Peso,
                        $data->Tipo,
                        $data->Talla,
                        $data->ID_Pez
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Registrar(pez $data)
	{
		try
		{
		$sql = "INSERT INTO pez (ID_Pez,Talla,Tipo,Talla)
		        VALUES (?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ID_Pez,
                    $data->Peso,
                    $data->Tipo,
                    $data->Talla
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}
}