
<?php

class Editorial {

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

	


	public function getAll()
	{


		$resultSet = [];
		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$result = $this->db->query('select * from Editorial');

		while($row = mysqli_fetch_row($result)){
			$resultSet[] =$row; 
		}

		return $resultSet;


	}

	public function guardarEditorial()
	{

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');

		$query = "insert into editorial (nombreEditorial) 
			values('".$this->nombre."')";

		if (mysqli_query($conn, $query)) 
		{
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "../AgregarEditorial.html";
            alert('Registo Exitosamente');
        </script>
        <?php

    	}
     else 
     {
     	echo '<label>'.$query.' </label>';
     }

	}

	public function BorrarEditorial(){

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');

		$query = "call borrarEditorial(".$this->id")";

		if (mysqli_query($conn, $query)) 
		{
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "../EliminarEditorial.php";
            alert('Autor Borrado Exitosamente');
        </script>
        <?php

    	}
     else 
     {
     	        ?>
        <script>
            window.location.href = "../EliminarEditorial.php";
            alert('Error al Borrar');
        </script>
        <?php
     }

	}
}


?>