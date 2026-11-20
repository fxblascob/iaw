<?php
    require_once 'db_functions.php';
    
    if (!isset($_REQUEST['id'])) {
        header("Location:listado_libros.php");
        exit();
    }
?>
<html>
<head>
    <meta charset="utf8">
    <title>Ejercicios de PHP</title>
</head>
<body>
    <h1>Información de libro</h1>
    <?php
    try {
        $libro = obtener_libro($_REQUEST['id']);
        
        if ($libro) {
            echo '<ul>';
            echo "<li>Título: " . htmlspecialchars($libro['titulo']) . "</li>";
            echo "<li>Autor: " . htmlspecialchars($libro['autor']) . "</li>";
            echo "<li>Editorial: " . htmlspecialchars($libro['editorial']) . "</li>";
            echo "<li>Género: " . htmlspecialchars($libro['genero']) . "</li>";
            
            if (!empty($libro['paginas'])) {
                echo "<li>Num. páginas: " . htmlspecialchars($libro['paginas']) . "</li>";
            }
            if (!empty($libro['fechaLanzamiento'])) {
                echo "<li>Fecha de lanzamiento: " . formatear_fecha($libro['fechaLanzamiento']) . "</li>";
            }
            if (!empty($libro['precio'])) {
                echo "<li>Precio: " . htmlspecialchars($libro['precio']) . "&euro;</li>";
            }
            echo '</ul>';
        } else {
            echo '<p>No se ha encontrado el registro especificado.</p>';
        }
    } catch (Exception $e) {
        echo '<p>Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    ?>
	<p>[<a href="listado_libros.php">Listado de libros</a>]</p>
</body>
</html>