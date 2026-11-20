<html>
<head>
	<meta charset="utf8">
	<title>Cálculo del área de un círculo con PHP</title>
</head>
<body>
	<?php
		// Constante PI
		define ('PI', 3.1416);
		// Variables para almacenar el radio y el área
		$radio = 3.5;
		$area = PI * $radio * $radio;
	?>
	<h1>Cálculo del área de un círculo de radio <?php echo $radio; ?></h1>
	<p>El área del círculo es <?php echo $area; ?>.</p>
</body>
</html>