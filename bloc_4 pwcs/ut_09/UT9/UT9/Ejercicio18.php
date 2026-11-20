<html>
<head>
	<meta charset="utf8">
	<title>Ejemplo básico de PHP</title>
</head>
<body>
	<h1>Curriculum</h1>
	<?php
		$estudios_es = "He estudiado bachillerato en el I.B. Miguel Hernández de Alicante, e Ingeniería Informática en la Universidad de Alicante";
		$estudios_en = "I've studied A levels at Miguel Hernández high school, in Alicante, and Computer Engineering at the University of Alicante";
		$idiomas_es = "Además de español, también sé hablar y escribir correctamente en inglés y valenciano.";
		$idiomas_en = "Besides Spanish, I can also speak and write properly in English and Valencian";
		$idioma = "en";
		$estudios = "estudios_" . $idioma;
		$idiomas = "idiomas_" . $idioma;		
	?>
	<p><?= $$estudios; ?></p>
	<p><?= $$idiomas; ?></p>
</body>
</html>