<?php
	session_start();
	$total = "";
	if (isset($_REQUEST['precio']))
	{
		$precio = $_REQUEST['precio'];
		if (isset($_SESSION['total']))
			$_SESSION['total'] += $precio;
		else
			$_SESSION['total'] = $precio;
		$total = "Total acumulado: " . $_SESSION['total'] . " euros";
	}
	if (isset($_REQUEST['vaciar']))
		$_SESSION = array();
?>
<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		if (!empty($total))
			echo "<p>$total</p>";
	?>
	
	<h1>Listado de artículos</h1>
	
	<ul>
		<li><a href="carro.php?precio=40">Zapatillas Reebok (40 euros)</a></li>
		<li><a href="carro.php?precio=15">Sudadera Domyos (15 euros)</a></li>
		<li><a href="carro.php?precio=50">Pala de pádel Vairo (50 euros)</a></li>
		<li><a href="carro.php?precio=20">Pelota de baloncesto Molten (20 euros)</a></li>
	</ul>
	
	<p>[<a href="carro.php?vaciar=si">Vaciar carro</a>]</p>
</body>
</html>