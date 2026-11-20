<?php
	function comprobar_dni($dni) {
		
	}
	function comprobar() {
		return (strlen($_REQUEST["nombre"]) > 2 and 
			   strlen($_REQUEST["apellidos"]) > 2 and 
			   comprobar_dni($_REQUEST["dni"])
	}
	include("./formulario.html");
	
	
	if (isset($_GET['enviar'])) {
		if (comprobar()) {
			$nombre = $_REQUEST['nombre'];
			$apellidos = $_REQUEST['apellidos'];
			$dni = $_REQUEST['dni'];
			$sexo = isset($_REQUEST['sexo']) ? $_REQUEST['sexo']) : "";
			$idiomas = $_REQUEST['idiomas'];
			$cursos_inf = $_REQUEST['cursos_inf'];
			$comentarios = $_REQUEST['comentarios'];
			
			echo "nombre: $nombre<br>";
			echo "apellidos: $apellidos <br>";
			echo "dni: $dni <br>";
			echo "sexo: $sexo <br>";
			echo "idiomas: <br>";
			foreach ($idiomas as &$idioma)
				echo "  - >  ",($idioma),"<br>";
			
			echo "cursos: <br>";
			foreach ($cursos_inf as &$curso)
				echo "   ->  ",($curso),"<br>";
			echo "comentarios: $comentarios <br>";
	
		}else echo "introduce correctamente los datos";
	}
	
?>