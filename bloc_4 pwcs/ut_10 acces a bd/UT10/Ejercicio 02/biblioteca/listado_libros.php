<?php
    require_once 'db_functions.php';
?>
<html>
<head>
    <meta charset="utf8">
    <title>Ejercicios de PHP</title>
</head>
<body>
    <h1>Listado de libros</h1>
    <?php
    try {
        $libros = obtener_listado_libros();
        
        if ($libros) {
            echo '<ul>';
            foreach ($libros as $libro) {
                $codigo = htmlspecialchars($libro['codigo']);
                $titulo = htmlspecialchars($libro['titulo']);
                $autor = htmlspecialchars($libro['autor']);
                echo "<li>{$titulo} ({$autor}) [<a href=\"info_libro.php?id={$codigo}\">Ver información</a>]</li>";
            }
            echo '</ul>';
        } else {
            echo '<p>No se han encontrado registros que mostrar.</p>';
        }
    } catch (Exception $e) {
        echo '<p>Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
    ?>
</body>
</html>