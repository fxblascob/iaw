<?php
function conectar_db() {
    try {
        $dsn = "mysql:host=localhost;port=3306;dbname=biblioteca;charset=utf8";
        $pdo = new PDO($dsn, "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        throw new Exception("Error de conexión: " . $e->getMessage());
    }
}

function obtener_libro($id) {
    try {
        $pdo = conectar_db();
        $stmt = $pdo->prepare("SELECT * FROM libro WHERE codigo = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Error al obtener el libro: " . $e->getMessage());
    }
}

function obtener_listado_libros() {
    try {
        $pdo = conectar_db();
        $stmt = $pdo->query("SELECT codigo, titulo, autor FROM libro");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw new Exception("Error al obtener el listado de libros: " . $e->getMessage());
    }
}

function borrar_libro($id) {
    try {
        $pdo = conectar_db();
        $stmt = $pdo->prepare("DELETE FROM libro WHERE codigo = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception("Error al borrar el libro: " . $e->getMessage());
    }
}

function insertar_libro($datos) {
    try {
        $pdo = conectar_db();
        $sql = "INSERT INTO libro (titulo, autor, editorial, genero, paginas, fechaLanzamiento, precio) 
                VALUES (:titulo, :autor, :editorial, :genero, :paginas, :fechaLanzamiento, :precio)";
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':titulo', $datos['titulo']);
        $stmt->bindParam(':autor', $datos['autor']);
        $stmt->bindParam(':editorial', $datos['editorial']);
        $stmt->bindParam(':genero', $datos['genero']);
        $stmt->bindParam(':paginas', $datos['paginas'], PDO::PARAM_INT);
        $stmt->bindParam(':fechaLanzamiento', $datos['fechaLanzamiento']);
        $stmt->bindParam(':precio', $datos['precio']);
        
        $stmt->execute();
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        throw new Exception("Error al insertar el libro: " . $e->getMessage());
    }
}

function modificar_libro($id, $datos) {
    try {
        $pdo = conectar_db();
        $sql = "UPDATE libro SET 
                titulo = :titulo,
                autor = :autor,
                editorial = :editorial,
                genero = :genero,
                paginas = :paginas,
                fechaLanzamiento = :fechaLanzamiento,
                precio = :precio
                WHERE codigo = :id";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $datos['titulo']);
        $stmt->bindParam(':autor', $datos['autor']);
        $stmt->bindParam(':editorial', $datos['editorial']);
        $stmt->bindParam(':genero', $datos['genero']);
        $stmt->bindParam(':paginas', $datos['paginas'], PDO::PARAM_INT);
        $stmt->bindParam(':fechaLanzamiento', $datos['fechaLanzamiento']);
        $stmt->bindParam(':precio', $datos['precio']);
        
        $stmt->execute();
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        throw new Exception("Error al modificar el libro: " . $e->getMessage());
    }
}

function formatear_fecha($fecha) {
    if ($fecha) {
        return date("d/m/Y", strtotime($fecha));
    }
    return '';
}

function sanitizar_entrada($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

function redirigir($pagina, $error = null) {
    if ($error) {
        header("Location: $pagina?error=" . urlencode($error));
    } else {
        header("Location: $pagina");
    }
    exit();
}
?>