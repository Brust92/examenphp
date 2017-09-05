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
	<form method="POST" name="AgregarLibro" action="service.php">
		<input type="hidden" name="action" value="AgregarLibro" />

		<center>

		<p>
			<label class= "labels">Titulo:</label>
			<input type="text" name="titulo" class="inputs">
		</p>

		<br>

<!--
		<p>
			<label class= "labels">Autor:</label>
			<input type="text" name="idautor" class="inputs">
		</p>

		<br>
-->

		
		<br>



		<p>
			<label class= "labels">Precio:</label>
			<input type="text" name="precio" class="inputs">
		</p>

		<br>

		<p>
			<label class= "labels">Edicion:</label>
			<input type="text" name="edicion" class="inputs">
		</p>


		<br>
		<!--

		<p>
			<label class= "labels">Editorial:</label>
			<input type="text" name="ideditorial" class="inputs">
		</p>
		<br>

		<p>
		-->
			<label class= "labels">Editorial:</label>
			<select class = "select" name="ideditorial">
				<?php

				$db = mysqli_connect("localhost:3306","luisfer","root","examen" );
				$sql = "select * from editorial;";
				$res = $db->query($sql);
				while ($rows = mysqli_fetch_row($res)){

					echo '<option value="'. $rows[0] .'">' . $rows[1] .'</option>';
				}

				 ?>

			</select>
		</p>
		<br>

		<p>
			<label class= "labels">Autor:</label>
			<select class = "select" name="idautor">
				<?php

				$db = mysqli_connect("localhost:3306","luisfer","root","examen" );
				$sql = "select * from autor;";
				$res = $db->query($sql);
				while ($rows = mysqli_fetch_row($res)){

					echo '<option value="'. $rows[0] .'">' . $rows[1] .'</option>';
				}

				 ?>

			</select>
		</p>


		

		<button type="summit" name = "action" value="AgregarLibro" class="botonAgregar">Agregar</button>
		<button type="reset" class="botonBorrar">Borrar</button>
	</center>

	</form>




	
	

	

</div>

</body>
</html>
