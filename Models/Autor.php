
<?php

class Autor {

	private $id = 0;
	private $nombre = '';

	private $db, $connect;

	public function __construct(){

		require_once('Connect.php');
		
		$this->connect=new Connect();
		$this->db = $this->connect->get_connection();
	}


/////////ID/////////////////
	function getId()
	{
		return $this->id;
	}

	function SetId($id)
	{
		$this->id = $id;

	}

	/////////Nombre/////////////////
	function getNombre()
	{
		return $this->nombre;
	}

	function SetNombre($nombre)
	{
		$this->nombre = $nombre;

	}

	


	public function getAll(){


		$resultSet = [];
		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$result = $this->db->query('select * from autor');

		while($row = mysqli_fetch_row($result)){
			$resultSet[] =$row; 
		}

		return $resultSet;


	}

	public function guardarAutor(){

		$query = $this->db->query('insert into autor (nombreAutor) 
			values('.$this->nombre.')');

	}




}
//$libro= new libro();
//$libro->getAll();

?>