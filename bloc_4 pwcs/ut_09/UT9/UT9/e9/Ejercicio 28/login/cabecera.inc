<?php
	session_start();
	if (!isset($_SESSION['loginusu']))
		header("Location: login.php");
?>
<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
	<style>
		body { background-color: #A9F5A9; font-family: Arial; }
		.logo { width: 80%; height: 50px; margin: 10px 10%; }
	</style>
</head>
<body>
	<img class="logo" src="logo.jpg" />
	<br />
	<p>[<a href="index.php">Indice</a>]&nbsp;&nbsp;&nbsp;[<a href="pag1.php">Página 1</a>]&nbsp;&nbsp;&nbsp;[<a href="pag2.php">Página 2</a>]</p>
	
