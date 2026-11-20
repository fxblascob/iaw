<?php
require_once 'db_functions.php';
?>
<html>
<head>
    <meta charset="utf8">
    <title>Ejercicios de PHP</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <h1>Listado de libros</h1>
    <?php
    if (!empty($_REQUEST['error'])) {
        echo '<p class="error">' . sanitizar_entrada($_REQUEST['error']) . '</p>';
    }

    try {
        $libros = obtener_listado_libros();
        
        if ($libros) {
            echo '<ul>';
            foreach ($libros as $libro) {
                $codigo = sanitizar_entrada($libro['codigo']);
                $titulo = sanitizar_entrada($libro['titulo']);
                $autor = sanitizar_entrada($libro['autor']);
                echo "<li>{$titulo} ({$autor}) ";
                echo "[<a href=\"info_libro.php?id={$codigo}\">Ver información</a>] ";
                echo "[<a href=\"borrar_libro.php?id={$codigo}\">Borrar libro</a>] ";
                echo "[<a href=\"edicion_libro.php?id={$codigo}\">Modificar datos</a>]";
                echo "</li>";
            }
            echo '</ul>';
        } else {
            echo '<p>No se han encontrado registros que mostrar.</p>';
        }
    } catch (Exception $e) {
        echo '<p class="error">' . sanitizar_entrada($e->getMessage()) . '</p>';
    }
    ?>
    <p>[<a href="index.php">Página principal</a>]</p>    
</body>
</html>