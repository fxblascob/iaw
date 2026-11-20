<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Buscador de libros</h1>
	<form action="result_libros.php" method="post">
		<label for="texto">Texto de búsqueda:</label>
		<input type="text" name="texto" size="30" />
		<br />
		<label for="buscaren">Buscar en:</label>
		<input type="radio" name="buscaren" value="Título" checked="checked" />Título del libro&nbsp;&nbsp;
		<input type="radio" name="buscaren" value="Autor" />Nombre del autor&nbsp;&nbsp;
		<input type="radio" name="buscaren" value="Editorial" />Editorial
		<br />
		<label for="genero">Tipo de libro:</label>
		<select name="genero">
			<option value="Narrativa">Narrativa</option>
			<option value="Libros de texto">Libros de texto</option>
			<option value="Guias">Guías y mapas</option>
		</select>
		<br />
		<input type="submit" value="Buscar" />
	</form>
</body>
</html>