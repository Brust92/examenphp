<link rel="stylesheet" type="text/css" href="../estilos.css">
<?php

class Libro {

	private $id = 0;
	private $titulo = '';
	private $precio= '';
	private $edicion= '';
	private $idautor= 0;
	private $ideditorial= 0;

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

	/////////Titulo/////////////////
	function getTitulo()
	{
		return $this->titulo;
	}

	function SetTitulo($titulo)
	{
		$this->titulo = $titulo;

	}

	/////////Precio/////////////////
	function getPrecio()
	{
		return $this->precio;
	}

	function SetPrecio($precio)
	{
		$this->precio = $precio;

	}

	/////////Edicion/////////////////
	function getEdicion()
	{
		return $this->edicion;
	}

	function SetEdicion($edicion)
	{
		$this->edicion = $edicion;

	}

	/////////idAutor/////////////////
	function getIdAutor()
	{
		return $this->idautor;
	}

	function SetIdAutor($idautor)
	{
		$this->idautor = $idautor;

	}

	/////////idEditorial/////////////////
	function getIdEditorial()
	{
		return $this->ideditorial;
	}

	function SetIdEditorial($ideditorial)
	{
		$this->ideditorial = $ideditorial;

	}


	public function getAll(){


		$resultSet = [];
		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$result = $this->db->query('select * from libro');

		//while($row = mysqli_fetch_row($result)){
	//		$resultSet[] =$row; 
		//}

		return $result;


	}


	public function getAllforTable(){


		$resultSet = [];
		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$result = $this->db->query('call SelectLibros()');

		return $result;


	}

	public function guardarLibro(){

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$query = "Call AgregarLibro('".$this->titulo."','".$this->precio."','".$this->edicion."',".$this->idautor.",".$this->ideditorial." )";

		if (mysqli_query($conn, $query)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "../agregarLibro.php";
            alert('Registrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "../agregarLibro.php";
            alert('Error al registrar');
        </script>
        <?php

    }



	}

	public function borrarLibro()
	{

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');

		$query = "call borrarLibro(".$this->id.")";

		if (mysqli_query($conn, $query)) 
		{
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "../EliminarLibro.php";
            alert('Libro Borrado Exitosamente');
        </script>
        <?php

    	}
     else 
     {
     	        ?>
        <script>
            window.location.href = "../EliminarLibro.php";
            alert('Error al Borrar');
        </script>
        <?php
     }
	}

}


?>