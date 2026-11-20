<html>
<head>
	<meta charset="utf8">
	<title>Ejemplo de uso del if</title>
</head>
<body>
	<?php
		// Variables para almacenar las notas
		$nota1 = 6;
		$nota2 = 8;
		// Comprobamos cuál es la mayor
		if ($nota1 > $nota2)
		{
			echo "La mayor nota es un $nota1";
		} 
		else {
			echo "La mayor nota es un $nota2";
		}
	?>
</body>
</html>