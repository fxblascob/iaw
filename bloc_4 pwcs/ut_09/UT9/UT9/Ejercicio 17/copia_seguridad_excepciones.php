<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		$origen = "aa.txt";
		$destino = "copia_aa.txt";
		try
		{
			if (!file_exists($origen))
			{
				throw new Exception("El fichero de entrada no existe");		
			}
			$contenido = file_get_contents($origen); 
			file_put_contents($destino, $contenido);
			echo "<p>Fin.</p>";
		} catch (Exception $e) {
			echo "<p>Se ha producido un error: " . $e->getMessage() . "</p>";
		}
	?>
</body>
</html>