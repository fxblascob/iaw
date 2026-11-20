<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Tablas de multiplicar</h1>
	<?php
		for ($i = 0; $i < 10; $i++)
		{
			for ($j = 0; $j <= 10; $j++)
			{
				$tabla[$i][$j] = $i*$j;
			}
		}
		
		for ($i = 0; $i < 10; $i++)
		{
			echo "<h2>Tabla del $i</h2>";
			for ($j = 0; $j <= 10; $j++)
			{
				echo "$i x $j = " . $tabla[$i][$j] . "<br />";
			}
		}
	?>
</body>
</html>