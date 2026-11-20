<html>
<head>
	<meta charset="utf8">
	<title>Ejercicios de PHP</title>
</head>
<body>
	<h1>Subiendo archivo</h1>
	<?php
		
		echo '<p>hello</p>';
		if (is_uploaded_file ($_FILES['fichero']['tmp_name']) && strpos($_FILES['fichero']['type'], "image") !== false) 
		{   	
			$nombreDirectorio = "imgs/"; 
			
			$idUnico = time();   
			$nombreFichero = $idUnico . "-" . $_FILES['fichero']['name'];
			
			
			move_uploaded_file ($_FILES['fichero']['tmp_name'], $nombreDirectorio . $nombreFichero); 
			echo '<img src="' . $nombreDirectorio . $nombreFichero . '" />';
			echo 'nombre foto' . $_FILES['fichero']['name'];
			echo '<p>' . $_FILES['fichero']['type'] . '</p>';
		} else
			print ("No se ha podido subir el fichero\n");
	?>
</body>
</html>