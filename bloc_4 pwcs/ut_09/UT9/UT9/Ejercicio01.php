<html>
<head>
	<meta charset="utf8">
	<title>Ejemplo básico de PHP</title>
</head>
<body>
	<h1>Información básica en PHP</h1>
	<?php
		// Variables para almacenar el nombre y el año de nacimiento
		$nombre = "Javier Blasco";
		$anyo = 1967;
	?>
	<p>Me llamo <?php echo $nombre; ?> y nací en el año <?php echo $anyo; ?>.</p>
</body>
</html>