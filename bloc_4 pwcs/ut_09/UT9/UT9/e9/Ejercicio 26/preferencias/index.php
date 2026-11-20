<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<?php
		if (isset($_COOKIE['colorusu']))
		{
			echo '<style>';
			echo 'body { background-color: ' . $_COOKIE['colorusu'] . '; }';
			echo '</style>';
		}
	?>
</head>
<body>
	<?php
		if (isset($_COOKIE['nombreusu']))
		{
			echo '<h1>Bienvenido, ' . $_COOKIE['nombreusu'] . '</h1>';
			echo "<p>[<a href=\"borrar_prefs.php\">Borrar preferencias</a>]</p>";
		}
		else
			echo '<h1>Página de inicio</h1>';
	?>
	<p>[<a href="preferencias.php">Preferencias</a>]</p>
</body>
</html>