<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		$origen = "datos.txt";
		$destino = "copia_datos.txt";
		if (file_exists($origen))
		{
			$contenido = file_get_contents($origen);
			file_put_contents($destino, $contenido);
			echo "<p>Copia finalizada correctamente.</p>";
		} else {
			echo "<p>ERROR: el fichero origen no existe.</p>";
		}
	?>
</body>
</html>