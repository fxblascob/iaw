<?php
require 'db.php';

// --- Borrar Matrícula ---
// Se requiere tanto el DNI como el Código del curso para identificar la fila única
if (isset($_GET['dni']) && isset($_GET['cod'])) {
    $stmt = $pdo->prepare("DELETE FROM matriculas WHERE dni = ? AND codigo = ?");
    $stmt->execute([$_GET['dni'], $_GET['cod']]);
    header("Location: matriculas.php");
    exit;
}

// --- Insertar Matrícula ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dni = $_POST['dni'];
    $codigo = $_POST['codigo'];
    
    // Verificar si ya existe esa combinación para evitar error de Clave Primaria Duplicada
    $check = $pdo->prepare("SELECT * FROM matriculas WHERE dni=? AND codigo=?");
    $check->execute([$dni, $codigo]);
    
    if ($check->rowCount() == 0) {
        $stmt = $pdo->prepare("INSERT INTO matriculas (dni, codigo) VALUES (?, ?)");
        $stmt->execute([$dni, $codigo]);
    } else {
        $error = "El alumno ya está matriculado en este curso.";
    }
}

// --- Obtener datos para los desplegables (Selects) ---
$listaAlumnos = $pdo->query("SELECT dni, nombre, apellidos FROM alumnos ORDER BY apellidos")->fetchAll();
$listaCursos  = $pdo->query("SELECT codigo, titulo FROM cursos ORDER BY titulo")->fetchAll();

// --- Obtener listado de matrículas con JOIN para ver nombres reales ---
// Usamos INNER JOIN para unir las 3 tablas
$sqlListado = "
    SELECT m.dni, m.codigo, a.nombre, a.apellidos, c.titulo 
    FROM matriculas m
    JOIN alumnos a ON m.dni = a.dni
    JOIN cursos c ON m.codigo = c.codigo
";
$matriculas = $pdo->query($sqlListado)->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <nav class="nav mb-4">
        <a class="nav-link" href="alumnos.php">Alumnos</a>
        <a class="nav-link" href="cursos.php">Cursos</a>
        <a class="nav-link" href="matriculas.php">Matrículas</a>
    </nav>

    <h2>Matriculaciones (Relación Muchos a Muchos)</h2>
    
    <?php if(isset($error)) echo "<div class='alert alert-warning'>$error</div>"; ?>

    <form method="POST" class="row g-3 mb-4 border p-3 bg-light">
        <div class="col-md-5">
            <label class="form-label">Seleccionar Alumno</label>
            <select name="dni" class="form-select" required>
                <option value="">-- Elige Alumno --</option>
                <?php foreach ($listaAlumnos as $a): ?>
                    <option value="<?= $a['dni'] ?>">
                        <?= $a['apellidos'] . ", " . $a['nombre'] ?> (<?= $a['dni'] ?>)
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-md-5">
            <label class="form-label">Seleccionar Curso</label>
            <select name="codigo" class="form-select" required>
                <option value="">-- Elige Curso --</option>
                <?php foreach ($listaCursos as $c): ?>
                    <option value="<?= $c['codigo'] ?>">
                        <?= $c['titulo'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Matricular</button>
        </div>
    </form>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Alumno</th>
                <th>DNI</th>
                <th>Curso Matriculado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($matriculas as $m): ?>
            <tr>
                <td><?= htmlspecialchars($m['apellidos'] . ", " . $m['nombre']) ?></td>
                <td><?= htmlspecialchars($m['dni']) ?></td>
                <td><?= htmlspecialchars($m['titulo']) ?></td>
                <td>
                    <a href="?dni=<?= $m['dni'] ?>&cod=<?= $m['codigo'] ?>" 
                       class="btn btn-danger btn-sm" 
                       onclick="return confirm('¿Dar de baja esta matrícula?')">
                       Dar de baja
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>