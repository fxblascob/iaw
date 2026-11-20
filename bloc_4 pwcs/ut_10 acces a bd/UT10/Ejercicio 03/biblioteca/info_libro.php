<?php
require_once 'db_functions.php';

if (!isset($_REQUEST['id'])) {
    redirigir('listado_libros.php');
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
            echo "<li>Título: " . sanitizar_entrada($libro['titulo']) . "</li>";
            echo "<li>Autor: " . sanitizar_entrada($libro['autor']) . "</li>";
            echo "<li>Editorial: " . sanitizar_entrada($libro['editorial']) . "</li>";
            echo "<li>Género: " . sanitizar_entrada($libro['genero']) . "</li>";
            
            if (!empty($libro['paginas'])) {
                echo "<li>Num. páginas: " . sanitizar_entrada($libro['paginas']) . "</li>";
            }
            if (!empty($libro['fechaLanzamiento'])) {
                echo "<li>Fecha de lanzamiento: " . formatear_fecha($libro['fechaLanzamiento']) . "</li>";
            }
            if (!empty($libro['precio'])) {
                echo "<li>Precio: " . sanitizar_entrada($libro['precio']) . "&euro;</li>";
            }
            echo '</ul>';
        } else {
            echo '<p>No se ha encontrado el registro especificado.</p>';
        }
    } catch (Exception $e) {
        echo '<p class="error">' . sanitizar_entrada($e->getMessage()) . '</p>';
    }
    ?>
    <p>[<a href="listado_libros.php">Listado de libros</a>]</p>
</body>
</html>