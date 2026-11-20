<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Listado de libros</h1>
	<?php
		include ("adodb/adodb.inc.php");
		$bd = NewADOConnection('mysqli');
		$bd->Connect("localhost:3307", "root", "", "biblioteca");
		$resultado = $bd->Execute("SELECT titulo, autor FROM libro");
		if ($resultado !== false)
		{
			echo '<ul>';
			while (!$resultado->EOF)
			{
				echo '<li>';
				echo $resultado->fields['titulo'];
				echo " (" . $resultado->fields['autor'] . ")";
				echo '</li>';
				$resultado->MoveNext();
			}
			echo '</ul>';
		} else {
			echo "<p>Error al obtener los resultados.</p>";
		}
		$bd->Disconnect();
		$bd->Close();
	?>
	<p>[<a href="index.php">Página principal</a>]</p>	
</body>
</html>