<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Ejemplo de uso de bucles</h1>
	<p>Usamos un for para contar del 1 al 100, separados por comas:</p>
	<?php
		// Contador del 1 al 100 con for
		for ($i = 1; $i < 100; $i++)
		{
			echo "$i,";
		}
		echo "100";		
	?>
	
	<p>Y ahora usamos un while para hacer una cuenta atrás desde 10:</p>
	
	<?php
		// Cuenta atrás con while
		$i = 10;
		while ($i > 0)
		{
			echo "$i-";
			$i--;
		}
		echo "0";
	?>
</body>
</html>