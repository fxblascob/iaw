<?php
	setCookie("nombreusu", $_REQUEST['nombre'], -1);
	setCookie("colorusu", $_REQUEST['color'], -1);
	header("Location: index.php");
?>
