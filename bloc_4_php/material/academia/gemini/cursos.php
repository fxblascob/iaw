<?php
require 'db.php';

// --- Borrar ---
if (isset($_GET['borrar'])) {
    $stmt = $pdo->prepare("DELETE FROM cursos WHERE codigo = ?");
    $stmt->execute([$_GET['borrar']]);
    header("Location: cursos.php");
    exit;
}

// --- Insertar ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO cursos (titulo, n_plazas, precio, lugar_realizacion) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['titulo'], $_POST['n_plazas'], $_POST['precio'], $_POST['lugar']]);
}

$cursos = $pdo->query("SELECT * FROM cursos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <nav class="nav mb-4">
        <a class="nav-link" href="alumnos.php">Alumnos</a>
        <a class="nav-link" href="cursos.php">Cursos</a>
        <a class="nav-link" href="matriculas.php">Matrículas</a>
    </nav>

    <h2>Gestión de Cursos</h2>

    <form method="POST" class="row g-3 mb-4 border p-2 bg-light">
        <div class="col-md-4"><input type="text" name="titulo" class="form-control" placeholder="Título Curso" required></div>
        <div class="col-md-2"><input type="number" name="n_plazas" class="form-control" placeholder="Plazas" required></div>
        <div class="col-md-2"><input type="number" name="precio" class="form-control" placeholder="Precio" required></div>
        <div class="col-md-3"><input type="text" name="lugar" class="form-control" placeholder="Lugar" required></div>
        <div class="col-md-1"><button type="submit" class="btn btn-primary">Añadir</button></div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr><th>Código</th><th>Título</th><th>Plazas</th><th>Precio</th><th>Lugar</th><th>Acción</th></tr>
        </thead>
        <tbody>
            <?php foreach ($cursos as $cur): ?>
            <tr>
                <td><?= $cur['codigo'] ?></td>
                <td><?= htmlspecialchars($cur['titulo']) ?></td>
                <td><?= $cur['n_plazas'] ?></td>
                <td><?= $cur['precio'] ?> €</td>
                <td><?= htmlspecialchars($cur['lugar_realizacion']) ?></td>
                <td><a href="?borrar=<?= $cur['codigo'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?')">Borrar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>