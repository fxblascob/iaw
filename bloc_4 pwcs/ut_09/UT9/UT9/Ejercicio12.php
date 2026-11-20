<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		define ('PI', 3.1416);
		$radio = 4;
		$area = PI * $radio * $radio;

		$textoResultado = "El área calculada del círculo es " . number_format($area, 2);
		echo "<p>$textoResultado</p>";
		
		$textoResultadoMayus = strtoupper($textoResultado);
		echo "<p>$textoResultadoMayus</p>";
		
		$textoResultadoModificado = str_replace("calculada", "obtenida", $textoResultado);
		echo "<p>$textoResultadoModificado</p>";
		
		echo "<p>El texto anterior tiene " . strlen($textoResultadoModificado) . " caracteres.</p>";
		
		echo "<p>La palabra <em>círculo</em> está en la posición " . strpos($textoResultadoModificado, "círculo") . ".</p>";
		
		$numeros = "1,2,3,4,5";
		$partesNumeros = explode(",", $numeros);
		$suma = 0;
		foreach($partesNumeros as $num)
		{
			$suma = $suma + $num;
		}
		$numerosSuma = implode("+", $partesNumeros);
		echo $numerosSuma . "=" . $suma;
	?>
</body>
</html>