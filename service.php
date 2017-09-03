<?php 
var_dump($_POST);
die;

session_start();

$servername = "localhost:3306";
$username = "luisfer";
$password = "root";
$dbname = "examen";
    
$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error)
	die("Connection failed" . $conn->connect_error);

$Type = $_POST['action'];

if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarLibro'){

	$titulo = $_POST["titulo"];
	$precio = $_POST["precio"];
	$edicion = $_POST["edicion"];
	$idautor = $_POST["idautor"];
	$ideditorial = $_POST["ideditorial"];

	$SQL = "insert into libro (titulo, precio, edicion, idautor, ideditorial) values('$titulo','$precio','$edicion',$idautor,$ideditorial)";

	    if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "index.html";
            alert('Registrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "index.html";
            alert('Error al registrar');
        </script>
        <?php

    }

    mysqli_close($conn);
}

?>