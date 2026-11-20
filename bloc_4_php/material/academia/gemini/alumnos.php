<?php
require 'db.php';

// --- Lógica de borrado ---
if (isset($_GET['borrar'])) {
    $stmt = $pdo->prepare("DELETE FROM alumnos WHERE dni = ?");
    $stmt->execute([$_GET['borrar']]);
    header("Location: alumnos.php");
    exit;
}

// --- Lógica de inserción ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "INSERT INTO alumnos (dni, nombre, apellidos, telefono, poblacion) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    try {
        $stmt->execute([$_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['poblacion']]);
    } catch (PDOException $e) {
        $error = "Error: El DNI ya existe o datos inválidos.";
    }
}

// --- Consulta para listar ---
$alumnos = $pdo->query("SELECT * FROM alumnos")->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Alumnos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <nav class="nav mb-4">
        <a class="nav-link" href="alumnos.php">Alumnos</a>
        <a class="nav-link" href="cursos.php">Cursos</a>
        <a class="nav-link" href="matriculas.php">Matrículas</a>
    </nav>

    <h2>Gestión de Alumnos</h2>
    
    <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <form method="POST" class="row g-3 mb-4 border p-2 bg-light">
        <div class="col-md-2"><input type="text" name="dni" class="form-control" placeholder="DNI" required maxlength="8"></div>
        <div class="col-md-2"><input type="text" name="nombre" class="form-control" placeholder="Nombre" required></div>
        <div class="col-md-3"><input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required></div>
        <div class="col-md-2"><input type="text" name="telefono" class="form-control" placeholder="Teléfono"></div>
        <div class="col-md-2"><input type="text" name="poblacion" class="form-control" placeholder="Población"></div>
        <div class="col-md-1"><button type="submit" class="btn btn-primary">Añadir</button></div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr><th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Teléfono</th><th>Población</th><th>Acción</th></tr>
        </thead>
        <tbody>
            <?php foreach ($alumnos as $alum): ?>
            <tr>
                <td><?= htmlspecialchars($alum['dni']) ?></td>
                <td><?= htmlspecialchars($alum['nombre']) ?></td>
                <td><?= htmlspecialchars($alum['apellidos']) ?></td>
                <td><?= htmlspecialchars($alum['telefono']) ?></td>
                <td><?= htmlspecialchars($alum['poblacion']) ?></td>
                <td><a href="?borrar=<?= $alum['dni'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Borrar?')">Borrar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>