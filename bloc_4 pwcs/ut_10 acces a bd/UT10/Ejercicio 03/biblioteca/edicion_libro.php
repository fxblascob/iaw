<?php
require_once 'db_functions.php';

if (!isset($_REQUEST['id'])) {
    redirigir('listado_libros.php');
}

// Inicializar variables
$titulo = $autor = $editorial = $genero = $paginas = $fechaLanzamiento = $precio = "";
$error = "";

try {
    $libro = obtener_libro($_REQUEST['id']);
    if ($libro) {
        $titulo = $libro['titulo'];
        $autor = $libro['autor'];
        $editorial = $libro['editorial'];
        $genero = $libro['genero'];
        $paginas = !empty($libro['paginas']) ? $libro['paginas'] : '';
        $fechaLanzamiento = !empty($libro['fechaLanzamiento']) ? $libro['fechaLanzamiento'] : '';
        $precio = !empty($libro['precio']) ? $libro['precio'] : '';
    } else {
        redirigir('listado_libros.php', 'No se encontró el libro especificado');
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<html>
<head>
    <meta charset="utf8">
    <title>Ejercicios de PHP</title>
    <style>
        .error { color: red; }
        label { display: inline-block; width: 150px; margin: 5px 0; }
        input, select { margin: 5px 0; }
        form { margin: 20px 0; }
    </style>
</head>
<body>
    <h1>Editar libro</h1>

    <?php if ($error): ?>
        <p class="error"><?= sanitizar_entrada($error) ?></p>
    <?php endif; ?>

    <form action="modificar_libro.php" method="post">
        <input type="hidden" name="codigo" value="<?= sanitizar_entrada($_REQUEST['id']) ?>" />
        
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" size="50" required 
               value="<?= sanitizar_entrada($titulo) ?>" /><br />
        
        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" size="50" required 
               value="<?= sanitizar_entrada($autor) ?>" /><br />
        
        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" size="50" required 
               value="<?= sanitizar_entrada($editorial) ?>" /><br />
        
        <label for="genero">Género:</label>
        <select id="genero" name="genero">
            <?php
            $generos = [
                'drama' => 'Drama',
                'ciencia ficción' => 'Ciencia ficción',
                'intriga' => 'Intriga',
                'otros' => 'Otros'
            ];
            
            foreach ($generos as $valor => $texto) {
                $selected = ($genero == $valor) ? ' selected="selected"' : '';
                echo "<option value=\"" . sanitizar_entrada($valor) . "\"$selected>" . 
                     sanitizar_entrada($texto) . "</option>";
            }
            ?>
        </select><br />
        
        <label for="paginas">Num. páginas:</label>
        <input type="number" id="paginas" name="paginas" min="1" 
               value="<?= sanitizar_entrada($paginas) ?>" /><br />
        
        <label for="fechaLanzamiento">Fecha de lanzamiento:</label>
        <input type="date" id="fechaLanzamiento" name="fechaLanzamiento" 
               value="<?= sanitizar_entrada($fechaLanzamiento) ?>" /><br />
        
        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" step="0.01" min="0" 
               value="<?= sanitizar_entrada($precio) ?>" /><br />
        
        <input type="submit" value="Guardar cambios" />
        <a href="listado_libros.php">Cancelar</a>
    </form>
</body>
</html>