<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<?php
		function calculaDescuento($precio, $descuento = 0)
		{
			$totalDescuento = $precio * $descuento/100;
			return $precio - $totalDescuento; 
		}
	?>
</head>
<body>
	<?php
		$descuento1 = calculaDescuento(250, 10);
		$descuento2 = calculaDescuento(85);
		echo "<p>El primer precio con descuento es $descuento1</p>";
		echo "<p>El segundo precio con descuento es $descuento2</p>";
	?>
</body>
</html>