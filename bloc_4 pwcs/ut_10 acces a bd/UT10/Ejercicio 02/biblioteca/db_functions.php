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

function formatear_fecha($fecha) {
    if ($fecha) {
        return date("d/m/Y", strtotime($fecha));
    }
    return '';
}
?>