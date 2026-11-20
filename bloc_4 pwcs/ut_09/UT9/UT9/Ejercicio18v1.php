<html>
<head>
	<meta charset="utf8">
	<title>Ejemplo básico de PHP</title>
</head>
<body>
	<h1>Curriculum</h1>
	<?php
		$estudis_cas = "He estudiado bachillerato en el I.B. Sant Vicent de Sant Vicent del Raspeig, e Ingeniería Informática en la Universidad de Alicante";
		$estudis_val = "He estudiat batxillerat en l'I.B. Sant Vicent de Sant Vicent del Raspeig, i Enginyeria Informàtica en la Universitat d'Alacant";
		$idiomes_cas = "Además de castellano, también sé hablar y escribir correctamente en inglés y valenciano.";
		$idiomes_val = "A més de valencià, també sé parlar i escriure correctament en anglés i castellà.";
		$idioma = "cas";
		$estudis = "estudis_" . $idioma;
		$idiomes = "idiomes_" . $idioma;		
	?>
	<p><?= $$estudis; ?></p>
	<p><?= $$idiomes; ?></p>
</body>
</html>
