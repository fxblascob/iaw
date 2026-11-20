<?php
	if (!isset($_REQUEST['titulo1']))
		header("Location:listado_libros.php");

	$bd = @mysqli_connect("localhost", "root", "", "biblioteca", 3307);
	mysqli_set_charset($bd, "utf8");
	if (mysqli_connect_errno() != 0)
	{
		header("Location:listado_libros.php?error=" . mysqli_connect_error());
	} else {
		$titulo[] = $_REQUEST['titulo1'];
		$autor[] = $_REQUEST['autor1'];
		$editorial[] = $_REQUEST['editorial1'];
		$genero[] = $_REQUEST['genero1'];
		$paginas[] = $_REQUEST['paginas1'];
		$fechaLanzamiento[] = $_REQUEST['fechaLanzamiento1'];
		$precio[] = $_REQUEST['precio1'];
		$error = "";
		if (empty($paginas[0]))
			$paginas[0] = "NULL";
		if (empty($precio[0]))
			$precio[0] = "NULL";
		if (empty($fechaLanzamiento[0]))
			$fechaLanzamiento[0] = "NULL";		
		else
			$fechaLanzamiento[0] = "'$fechaLanzamiento[0]'";
		
		$titulo[] = $_REQUEST['titulo2'];
		$autor[] = $_REQUEST['autor2'];
		$editorial[] = $_REQUEST['editorial2'];
		$genero[] = $_REQUEST['genero2'];
		$paginas[] = $_REQUEST['paginas2'];
		$fechaLanzamiento[] = $_REQUEST['fechaLanzamiento2'];
		$precio[] = $_REQUEST['precio2'];
		if (empty($paginas[1]))
			$paginas[1] = "NULL";
		if (empty($precio[1]))
			$precio[1] = "NULL";
		if (empty($fechaLanzamiento[1]))
			$fechaLanzamiento[1] = "NULL";		
		else
			$fechaLanzamiento[1] = "'$fechaLanzamiento[1]'";
		
		$titulo[] = $_REQUEST['titulo3'];
		$autor[] = $_REQUEST['autor3'];
		$editorial[] = $_REQUEST['editorial3'];
		$genero[] = $_REQUEST['genero3'];
		$paginas[] = $_REQUEST['paginas3'];
		$fechaLanzamiento[] = $_REQUEST['fechaLanzamiento3'];
		$precio[] = $_REQUEST['precio3'];
		if (empty($paginas[2]))
			$paginas[2] = "NULL";
		if (empty($precio[2]))
			$precio[2] = "NULL";
		if (empty($fechaLanzamiento[2]))
			$fechaLanzamiento[2] = "NULL";		
		else
			$fechaLanzamiento[2] = "'$fechaLanzamiento[2]'";
		
		if (mysqli_autocommit($bd, false) === false)
		{
			echo 'Transacciones no soportadas';
		} else {		
			try
			{
				mysqli_query($bd, "INSERT INTO libro(titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) VALUES ('$titulo[0]', '$autor[0]', '$editorial[0]', '$genero[0]', $paginas[0], $fechaLanzamiento[0], $precio[0])");
				mysqli_query($bd, "INSERT INTO libro(titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) VALUES ('$titulo[1]', '$autor[1]', '$editorial[1]', '$genero[1]', $paginas[1], $fechaLanzamiento[1], $precio[1])");
				mysqli_query($bd, "INSERT INTO libro(titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) VALUES ('$titulo[2]', '$autor[2]', '$editorial[2]', '$genero[2]', $paginas[2], $fechaLanzamiento[2], $precio[2])");
				mysqli_commit($bd);
			} catch (Exception $e) {
				$error = 'Se ha producido un error: ' . $e->getMessage();
				mysqli_rollback($bd);
			}
		}
		mysqli_autocommit($bd, true);
		mysqli_close($bd);
		if (empty($error))
			header("Location:listado_libros.php");
		else
			header("Location:listado_libros.php?error=" . $error);
		
	}
?>
