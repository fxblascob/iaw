<?php
	session_start();
	$error = "";
	if (isset($_REQUEST['login']))
	{
		$usu = $_REQUEST['login'];
		$pass = $_REQUEST['password'];
		$usuarios = file("usuarios.txt", FILE_IGNORE_NEW_LINES);
		foreach ($usuarios as $usuario)
		{
			if ($usuario == $usu . ":" . $pass)
			{
				$_SESSION['loginusu'] = $usu;
				header("Location: index.php");
			}
		}
		$error = "Error al validar el usuario";
	}
?>
<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<style>
		.error { color:red; }
	</style>
</head>
<body>
	<h1>Login</h1>
	<?php
		if (!empty($error))
			echo '<p class="error">' . $error . '</p>';
	?>
	<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="login">Login:</label>
		<input type="text" name="login" size="20" /><br />
		<label for="password">Password:</label>
		<input type="password" name="password" size="20" /><br />
		<input type="submit" value="Enviar" />
	</form>
</body>
</html>