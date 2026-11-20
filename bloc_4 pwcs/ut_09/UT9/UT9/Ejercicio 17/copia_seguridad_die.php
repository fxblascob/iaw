<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		$origen = "aa.txt";
		$destino = "copia_aa.txt";
		file_exists($origen) or die ("No se encuentra el archivo origen");
		$contenido = file_get_contents($origen); // Si ponemos aquí el "or die" intentará abrir el archivo y mostrará el Warning de todos modos
		file_put_contents($destino, $contenido);
		echo "<p>Fin.</p>";
	?>
</body>
</html>