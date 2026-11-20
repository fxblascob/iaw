<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>

	<?php	
		if (empty($_REQUEST['departamento']))
		{
			// No se ha enviado ningún departamento. Mostramos el formulario
	?>
		<h1>Seleccionar departamento</h1>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<select name="departamento">
				<option value="INF">Informática</option>
				<option value="LEN">Lengua</option>
				<option value="MAT">Matemáticas</option>
				<option value="ING">Inglés</option>
			</select>
			<br />
			<input type="submit" value="Enviar" />
		</form>	
	<?php
		} else {
			// Sí se ha enviado departamento. Mostramos su presupuesto.
			$depto = $_REQUEST['departamento'];
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
		}
	?>
</body>
</html>