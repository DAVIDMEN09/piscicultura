<?php
class empleado
{
	//Atributo para conexión a SGBD
	private $pdo;

		//Atributos del objeto proveedor
		public $ID_Empleado;
		public $Area;
		public $Edad;
		public $Telefono;
		public $Dirección;
		public $Nombre;
		public $Sexo;

	//Método de conexión a SGBD.
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

	//Este método selecciona todas las tuplas de la tabla
	//proveedor en caso de error se muestra por pantalla.
	public function ListarE()
	{
		try
		{
			$result = array();
			//Sentencia SQL para selección de datos.
			$stm = $this->pdo->prepare("SELECT * FROM empleado");
			//Ejecución de la sentencia SQL.
			$stm->execute();
			//fetchAll — Devuelve un array que contiene todas las filas del conjunto
			//de resultados
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			//Obtener mensaje de error.
			die($e->getMessage());
		}
	}

	//Este método obtiene los datos del proveedor a partir del nit
	//utilizando SQL.
	public function Obtener($ID_Empleado)
	{
		try
		{
			//Sentencia SQL para selección de datos utilizando
			//la clausula Where para especificar el nit del proveedor.
			$stm = $this->pdo->prepare("SELECT * FROM empleado WHERE ID_Empleado = ?");
			//Ejecución de la sentencia SQL utilizando el parámetro nit.
			$stm->execute(array($ID_Empleado));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Este método elimina la tupla proveedor dado un nit.
	public function Eliminar($ID_Empleado)
	{
		try
		{
			//Sentencia SQL para eliminar una tupla utilizando
			//la clausula Where.
			$stm = $this->pdo
			            ->prepare("DELETE FROM empleado WHERE ID_Empleado = ?");

			$stm->execute(array($ID_Empleado));
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que actualiza una tupla a partir de la clausula
	//Where y el nit del proveedor.
	public function Actualizar($data)
	{
		try
		{
			//Sentencia SQL para actualizar los datos.
			$sql = "UPDATE empleado SET
						Area= ?,
						Edad= ?,
            			Telefono= ?,
						Dirección= ?,
						Nombre= ?,
						Sexo= ?
				    WHERE ID_Empleado = ?";
			//Ejecución de la sentencia a partir de un arreglo.
			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->Area,
                        $data->Edad,
                        $data->Telefono,
						$data->Dirección,
						$data->Nombre,
						$data->Sexo,
                        $data->ID_Empleado
					)
				);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método que registra un nuevo proveedor a la tabla.
	public function Registrar(empleado $data)
	{
		try
		{
			//Sentencia SQL.
			$sql = "INSERT INTO empleado (ID_Empleado,Area,Edad,Telefono,Dirección,Nombre,Sexo)
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql)
		     ->execute(
				array(
					$data->ID_Empleado,
                    $data->Area,
                    $data->Edad,
                    $data->Telefono,
                    $data->Dirección,
					$data->Nombre,
					$data->Sexo
                )
			);
		} catch (Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function login(empleado $data){
		try {

			$sql="Select * from admin where usuario = ? and contrasena= ?";
			$query=$this->pdo->prepare($sql)->execute(array($data->email, $data->pwd));
			$cant=$query->rowCount();
			if ($cant>=1) {
				session_start();

				$_SESSION['email'] = $data->email;
			}
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
