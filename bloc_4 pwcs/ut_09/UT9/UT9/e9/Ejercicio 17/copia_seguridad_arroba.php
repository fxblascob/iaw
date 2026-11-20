<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		$origen = "aa.txt";
		$destino = "copia_aa.txt";
		$contenido = @file_get_contents($origen);
		@file_put_contents($destino, $contenido);
		echo "<p>Fin.</p>";
	?>
</body>
</html>