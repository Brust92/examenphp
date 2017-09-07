<?php   
//var_dump($_REQUEST);
//die();

 
$Type = $_POST['action'];


/////////////////AGREGAR LIBRO///////////////////

if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarLibro'){

    require_once('../Models/Libro.php');
    $libro = new Libro();

	$libro->SetTitulo($_POST["titulo"]);
    $libro->SetPrecio($_POST["precio"]);
    $libro->SetEdicion($_POST["edicion"]);
    $libro->SetIdAutor($_POST["idautor"]);
    $libro->SetIdEditorial($_POST["ideditorial"]);

    $libro->guardarLibro();


}

/////////////////AGREGAR AUTOR///////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarAutor'){


    require_once('../Models/Libro.php');
    $libro = new libro();
     ?>

     <script>
            window.location.href = "../agregarLibro.php";
            alert('Registrado Exitosamente');
    </script>
     <?php


}
/////////////////ELIMINAR LIBRO///////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarLibro'){


    require_once('../Models/Libro.php');
    $libro = new libro();
    $libro->SetId($_POST["idlibro"]);

     $libro->borrarLibro();
     ?>

     <script>
            window.location.href = "../agregarLibro.php";
            alert('Registrado Exitosamente');
    </script>
     <?php


}

?>