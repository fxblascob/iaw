<?php
	if (isset($_REQUEST['nombre']))
		setCookie("nombreusu", $_REQUEST['nombre'], time() + 300);
	if (isset($_REQUEST['color']))
		setCookie("colorusu", $_REQUEST['color'], time() + 300);
	header("Location: index.php");
?>
