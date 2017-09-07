
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

	


	public function getActorForDelete(){


		$resultSet = [];
		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');
		$result = $this->db->query('call selectActorForDelete()');

		return $result;


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

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');

		$query = "insert into autor (nombreAutor) 
			values('".$this->nombre."')";

		if (mysqli_query($conn, $query)) 
		{
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "../AgregarAutor.html";
            alert('Autor Agregado Exitosamente');
        </script>
        <?php

    	}
     else 
     {
     	        ?>
        <script>
            window.location.href = "../AgregarAutor.html";
            alert('Error al Agregar');
        </script>
        <?php
     }

	}



	public function BorrarAutor(){

		$conn = new mysqli('localhost', 'luisfer', 'root', 'examen');

		$query = "call BorrarAutor(".$this->id.")";

		if (mysqli_query($conn, $query)) 
		{
       		mysqli_close($conn);
        	?>
       		 <script>
        	    window.location.href = "../EliminarAutor.php";
       		    alert('Autor Borrado Exitosamente');
       		 </script>
        <?php

    	}
     else 
     {
     	        ?>
       	 <script>
            window.location.href = "../EliminarAutor.php";
            alert('Error al Borrar');
      	  </script>
        <?php
     }

	}




}
//$libro= new libro();
//$libro->getAll();

?>