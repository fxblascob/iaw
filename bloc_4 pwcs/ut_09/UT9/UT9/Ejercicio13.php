<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<?php
		
		echo "<p>Fecha y hora actuales: " . date("d M Y - H:i:s") . "</p>";	
		echo "<p>Otra vez usando time(): " . date("d M Y - H:i:s", time()) . "</p>";
	?>
</body>
</html>