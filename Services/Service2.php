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


    require_once('../Models/Autor.php');
    $autor = new Autor();
    $autor->SetNombre($_POST["nombreAutor"]);
    $autor->guardarAutor();


}
/////////////////ELIMINAR LIBRO///////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarLibro'){


    require_once('../Models/Libro.php');
    $libro = new libro();
    $libro->SetId($_POST["idlibro"]);

     $libro->borrarLibro();


}

////////////////BORRAR AUTOR////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarAutor'){


    require_once('../Models/Autor.php');
    $autor = new Autor();
    $autor->SetId($_POST["idAutor"]);
    $autor->BorrarAutor();


}

/////////////////AGREGAR EDITORIAL///////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'AgregarEditorial'){


    require_once('../Models/Editorial.php');
    $editorial = new Editorial();
    $editorial->SetNombre($_POST["nombreEditorial"]);
    $editorial->guardarEditorial();


}

////////////////BORRAR AUTOR////////////////

else if($_SERVER['REQUEST_METHOD'] == 'POST' && $Type == 'EliminarEditorial'){


    require_once('../Models/Editorial.php');
    $editorial = new Editorial();
    $editorial->SetId($_POST["ideditorial"]);
    $editorial->BorrarEditorial();


}

?>