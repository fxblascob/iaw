<?php

	if (!isset($_REQUEST['texto']))
	{
		header("Location:form_libros.php?error=si");
	}

	include('cabecera.inc');
?>

	<h1>Resultado del formulario de búsqueda</h1>
	<p>Estos son los datos introducidos:</p>
	<ul>
		<li>Texto de búsqueda: <?php echo $_REQUEST['texto']; ?></li>
		<li>Buscar en: <?php echo $_REQUEST['buscaren']; ?></li>
		<li>Género: <?php echo $_REQUEST['genero']; ?></li>
	</ul>
	<p>[<a href="form_libros.php">Nueva búsqueda</a>]</p>
</body>
</html>