<?php
require_once 'db_functions.php';

if (!isset($_REQUEST['id'])) {
    redirigir('listado_libros.php');
}

try {
    $id = (int)$_REQUEST['id'];
    if (borrar_libro($id)) {
        redirigir('listado_libros.php');
    } else {
        redirigir('listado_libros.php', 'No se encontró el libro a borrar');
    }
} catch (Exception $e) {
    redirigir('listado_libros.php', $e->getMessage());
}
?>
