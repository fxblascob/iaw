<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>

	<?php
		$depto = $_REQUEST['departamento'];
		echo $depto;
		$presup = 0;
		if ($depto == 'INF')
		{
			$presup = 500;
		} else if ($depto == 'LEN' || $depto == 'MAT') {
			$presup = 300;
		} else {
			$presup = 400;
		}
		
		echo "<h1>Presupuesto asignado</h1>";
		echo "<p>El presupuesto asignado a tu departamento es de $presup euros.</p>";
	?>
</body>
</html>