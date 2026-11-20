<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		// Contador del 1 al 100 con for
		for ($i = 1; $i < 100; $i++)
		{
			echo "$i,";
		}
		echo "100";
		
		echo "<br /><br />";
		
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