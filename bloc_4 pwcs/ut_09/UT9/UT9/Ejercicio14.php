<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		$hora = "21:30:12";
		$hora2 = "12:63:11";
		
		// Comprobamos la primera hora
		if (preg_match("/([0-9]{2}):([0-9]{2}):([0-9]{2})/", $hora, $partes)){

		
		if ($partes[1] >= 0 && $partes[1] <= 23 && $partes[2] >= 0 && $partes[2] <= 59 && $partes[3] >= 0 && $partes[3] <= 59)
			echo "<p>La hora $hora es válida.</p>";			
		else
			echo "<p>La hora $hora NO es válida.</p>";			
		}
		// Comprobamos la segunda hora
		if (preg_match("/([0-9]{2}):([0-9]{2}):([0-9]{2})/", $hora2, $partes))
		{
		if ($partes[1] >= 0 && $partes[1] <= 23 && $partes[2] >= 0 && $partes[2] <= 59 && $partes[3] >= 0 && $partes[3] <= 59)
			echo "<p>La hora $hora2 es válida.</p>";			
		else
			echo "<p>La hora $hora2 NO es válida.</p>";	
		}		
	?>
</body>
</html>