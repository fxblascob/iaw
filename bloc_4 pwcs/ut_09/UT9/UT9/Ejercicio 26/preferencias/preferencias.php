<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Preferencias del usuario</h1>
	<form action="guarda_prefs.php" method="post">
		<label for="nombre">Nombre:</label>
		<input type="text" name="nombre" size="30" />
		<br />
		<label for="color">Color favorito:</label>
		<input type="radio" name="color" value="red" />Rojo&nbsp;&nbsp;
		<input type="radio" name="color" value="green" />Verde&nbsp;&nbsp;
		<input type="radio" name="color" value="yellow" checked="checked" />Amarillo
		<br />
		<input type="submit" value="Enviar" />
	</form>
</body>
</html>