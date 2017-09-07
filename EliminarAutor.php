<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
<link rel="stylesheet" type="text/css" href="estilos.css">

</head>
<body class="background">

	<button onclick="window.location.href='agregarLibro.php'" class="botones">Agregar Libro</button>
	<button onclick="window.location.href='EliminarLibro.php'" class="botones">Eliminar Libro</button>
	<button onclick="window.location.href='AgregarAutor.html'" class="botones">Agregar Autor</button>
	<button onclick="window.location.href='EliminarAutor.php'" class="botones">Eliminar Autor</button>
	<button onclick="window.location.href='AgregarEditorial.html'" class="botones">Agregar Editorial</button>
		<button onclick="window.location.href='EliminarEditorial.php'" class="botones">Eliminar Editorial</button>


<div>
	<form method="POST" name="EliminarAutor" action="Services/Service2.php">
		<input type="hidden" name="action" value="EliminarAutor" />

		<center>

			<label class= "labels">Autor:</label>
			<select class = "select" name="idAutor">
				<?php

				require_once('Models/Autor.php');

				$autor = new Autor();

				$res = $autor->getActorForDelete();

				while ($rows = mysqli_fetch_row($res)){
					if ($rows[2] == 0) 
					{					

					echo '<option value="'. $rows[0] .'">' . $rows[1] .'</option>';
					}
				}

				 ?>

			</select>


			<button type="summit" name = "action" value="EliminarAutor" class="botonBorrar">Borrar</button>


		</center>
		<br>
		<br>

	</form>
	<center>

	<table border="1">

		<tr class="tablatitle">
			<th>Autor</th>
			<th>Libros Publicados</th>

		</tr>
		<?php


				require_once('Models/Autor.php');

				$autor = new Autor();

				$res = $autor->getActorForDelete();
				
				while ($rows = mysqli_fetch_row($res)){

					echo '<tr class="tabla">  
								<th class="tablechars">' . $rows[1] .'</th>
								<th class="tablechars">' . $rows[2] .'</th>

								</tr>';
				}

				 ?>

	</table>
	</center>
	

</div>

</body>
</html>
