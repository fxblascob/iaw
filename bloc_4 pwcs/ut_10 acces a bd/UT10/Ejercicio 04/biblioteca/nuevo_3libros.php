<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Nuevos 3 libros</h1>
	<form action="insertar_3libros.php" method="post">
		<fieldset>
			<legend>Libro 1</legend>
			<label for="titulo1">Título:</label>
			<input type="text" name="titulo1" size="50" required aria-required="true" /><br />
			<label for="autor1">Autor:</label>
			<input type="text" name="autor1" size="50" required aria-required="true" /><br />
			<label for="editorial1">Editorial:</label>
			<input type="text" name="editorial" size="50" required aria-required="true" /><br />
			<label for="genero1">Género:</label>
			<select name="genero1">
				<option value="drama">Drama</option>
				<option value="ciencia ficción">Ciencia ficción</option>
				<option value="intriga">Intriga</option>
				<option value="otros">Otros</option>
			</select><br />
			<label for="paginas1">Num. páginas:</label>
			<input type="number" name="paginas1" size="10" /><br />
			<label for="fechaLanzamiento1">Fecha de lanzamiento:</label>
			<input type="date" name="fechaLanzamiento1" size="10" /><br />
			<label for="precio1">Precio:</label>
			<input type="number" name="precio1" size="10" /><br />
		</fieldset>
		<fieldset>
			<legend>Libro 2</legend>
			<label for="titulo2">Título:</label>
			<input type="text" name="titulo2" size="50" required aria-required="true" /><br />
			<label for="autor2">Autor:</label>
			<input type="text" name="autor2" size="50" required aria-required="true" /><br />
			<label for="editorial2">Editorial:</label>
			<input type="text" name="editorial2" size="50" required aria-required="true" /><br />
			<label for="genero2">Género:</label>
			<select name="genero2">
				<option value="drama">Drama</option>
				<option value="ciencia ficción">Ciencia ficción</option>
				<option value="intriga">Intriga</option>
				<option value="otros">Otros</option>
			</select><br />
			<label for="paginas2">Num. páginas:</label>
			<input type="number" name="paginas2" size="10" /><br />
			<label for="fechaLanzamiento2">Fecha de lanzamiento:</label>
			<input type="date" name="fechaLanzamiento2" size="10" /><br />
			<label for="precio2">Precio:</label>
			<input type="number" name="precio2" size="10" /><br />
		</fieldset>
		<fieldset>
			<legend>Libro 3</legend>
			<label for="titulo3">Título:</label>
			<input type="text" name="titulo3" size="50" required aria-required="true" /><br />
			<label for="autor3">Autor:</label>
			<input type="text" name="autor3" size="50" required aria-required="true" /><br />
			<label for="editorial3">Editorial:</label>
			<input type="text" name="editorial3" size="50" required aria-required="true" /><br />
			<label for="genero3">Género:</label>
			<select name="genero3">
				<option value="drama">Drama</option>
				<option value="ciencia ficción">Ciencia ficción</option>
				<option value="intriga">Intriga</option>
				<option value="otros">Otros</option>
			</select><br />
			<label for="paginas3">Num. páginas:</label>
			<input type="number" name="paginas3" size="10" /><br />
			<label for="fechaLanzamiento3">Fecha de lanzamiento:</label>
			<input type="date" name="fechaLanzamiento3" size="10" /><br />
			<label for="precio3">Precio:</label>
			<input type="number" name="precio3" size="10" /><br />
		</fieldset>
		<input type="submit" value="Enviar" />
	</form>
</body>
</html>