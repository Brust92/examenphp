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
	<form method="POST" name="EliminarLibro" action="Services/Service2.php">
		<input type="hidden" name="action" value="EliminarLibro" />

		<center>

			<label class= "labels">Libro:</label>
			<select class = "select" name="idlibro">
				<?php

				require_once('Models/Libro.php');

				$libro = new Libro();
				$res = $libro->getAll();
				while ($rows = mysqli_fetch_row($res)){

					echo '<option value="'. $rows[0] .'">' . $rows[1] .'</option>';
				}

				 ?>

			</select>


			<button type="summit" name = "action" value="EliminarLibro" class="botonBorrar">Borrar</button>


		</center>
		<br>
		<br>

	</form>
	<center>

	<table border="1">

		<tr class="tablatitle">
			<th>Titulo</th>
			<th>Precio</th>
			<th>Edicion</th>
			<th>Autor</th>
			<th>Editorial</th>

		</tr>


		<?php

			//require_once('Models/Libro.php');

			$libro = new Libro();
			$res = $libro->getAllforTable();

			while ($rows = mysqli_fetch_row($res)){

					echo '<tr class="tabla">  
								<th class="tablechars">' . $rows[1] .'</th>
								<th class="tablechars">' . $rows[2] .'</th>
								<th class="tablechars">' . $rows[3] .'</th>
								<th class="tablechars">' . $rows[4] .'</th>
								<th class="tablechars">' . $rows[5] .'</th>
								</tr>';
				}

		?>
		<!--<?php

				/*$db = mysqli_connect("localhost:3306","luisfer","root","examen" );

				$sql = "select  L.idlibro,
								L.titulo,
								L.precio,
								L.edicion,
								A.nombreAutor,
								E.nombreEditorial 
								from libro L, autor A, editorial E
								where L.idautor = A.idautor and L.ideditorial = E.ideditorial
								order by L.titulo ";

				$res = $db->query($sql);
				while ($rows = mysqli_fetch_row($res)){

					echo '<tr class="tabla">  
								<th class="tablechars">' . $rows[1] .'</th>
								<th class="tablechars">' . $rows[2] .'</th>
								<th class="tablechars">' . $rows[3] .'</th>
								<th class="tablechars">' . $rows[4] .'</th>
								<th class="tablechars">' . $rows[5] .'</th>
								</tr>';
				}*/

				 ?>-->

	</table>
	</center>
	

</div>

</body>
</html>
