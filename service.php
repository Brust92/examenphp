<?php 
//var_dump($_REQUEST);
//die();

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
            window.location.href = "agregarLibro.php";
            alert('Registrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "agregarLibro.php";
            alert('Error al registrar');
        </script>
        <?php

    }

    mysqli_close($conn);
}

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarAutor'){

    $nombreAutor = $_POST["nombreAutor"];

    $SQL = "insert into autor (nombreAutor) values('$nombreAutor')";

        if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "AgregarAutor.html";
            alert('Registrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "AgregarAutor.html";
            alert('Error al registrar');
        </script>
        <?php

    }

    mysqli_close($conn);
}

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarEditorial'){

    $nombreEditorial = $_POST["nombreEditorial"];

    $SQL = "insert into editorial (nombreEditorial) values('$nombreEditorial')";

        if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "AgregarEditorial.html";
            alert('Registrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "AgregarEditorial.html";
            alert('Error al Registrar');
        </script>
        <?php

    }

    mysqli_close($conn);
}

/////////////Eliminar Libro

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarLibro'){

    $idlibro = $_POST["idlibro"];

    $SQL = "delete from libro where $idlibro = idlibro";

        if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "EliminarLibro.php";
            alert('Libro borrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "EliminarLibro.php";
            alert('Error al borrar el Libro');
        </script>
        <?php

    }

    mysqli_close($conn);
}

////////////eliminar Autor


else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarAutor'){

    $idAutor = $_POST["idAutor"];

    $SQL = "delete from autor where $idAutor = idautor";

        if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "EliminarAutor.php";
            alert('Autor borrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "EliminarAutor.php";
            alert('Error al borrar el Autor');
        </script>
        <?php

    }

    mysqli_close($conn);
}

///////////Eliminar Editorial

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarEditorial'){

    $ideditorial = $_POST["ideditorial"];

    $SQL = "call borrarEditorial($ideditorial)";

        if (mysqli_query($conn, $SQL)) {
        mysqli_close($conn);
        ?>
        <script>
            window.location.href = "EliminarEditorial.php";
            alert('Editorial borrado Exitosamente');
        </script>
        <?php

    } else {
        ?>
        <script>
            window.location.href = "EliminarEditorial.php";
            alert('Error al borrar el Editorial');
        </script>
        <?php

    }

    mysqli_close($conn);
}

?>

