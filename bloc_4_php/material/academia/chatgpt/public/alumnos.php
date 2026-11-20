<?php
session_start();
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../app/flash.php';
require_once __DIR__ . '/../app/repo/AlumnosRepo.php';
require_once __DIR__ . '/../app/repo/MatriculasRepo.php';

$action = $_POST['action'] ?? $_GET['action'] ?? null;

try {
  if ($action === 'create') {
    alumnos_create([
      'dni' => trim($_POST['dni'] ?? ''),
      'nombre' => trim($_POST['nombre'] ?? ''),
      'apellidos' => trim($_POST['apellidos'] ?? ''),
      'telefono' => trim($_POST['telefono'] ?? ''),
      'poblacion' => trim($_POST['poblacion'] ?? ''),
    ]);
    flash_set('ok', 'Alumno creado');
    redirect('/alumnos.php');
  }

  if ($action === 'update') {
    $dni = trim($_POST['dni'] ?? '');
    alumnos_update($dni, [
      'nombre' => trim($_POST['nombre'] ?? ''),
      'apellidos' => trim($_POST['apellidos'] ?? ''),
      'telefono' => trim($_POST['telefono'] ?? ''),
      'poblacion' => trim($_POST['poblacion'] ?? ''),
    ]);
    flash_set('ok', 'Alumno actualizado');
    redirect('./alumnos.php?dni=' . urlencode($dni));
  }

  if ($action === 'delete') {
    $dni = trim($_POST['dni'] ?? '');
    alumnos_delete($dni);
    flash_set('ok', 'Alumno eliminado (y sus matrículas)');
    redirect('./alumnos.php');
  }
} catch (PDOException $e) {
  flash_set('err', 'Error DB: ' . $e->getMessage());
  redirect('./alumnos.php');
}

$q = trim($_GET['q'] ?? '');
$alumnos = $q !== '' ? alumnos_search($q) : alumnos_all();

$selectedDni = trim($_GET['dni'] ?? '');
$selected = $selectedDni ? alumnos_find($selectedDni) : null;
$cursosAlumno = $selected ? cursos_de_alumno($selectedDni) : [];

ob_start();
?>
<div class="grid">
  <div>
    <h2 style="margin-top:0">Alumnos</h2>

    <form method="get" class="actions" style="margin-bottom:10px">
      <input name="q" placeholder="Buscar por DNI, nombre o apellidos" value="<?= h($q) ?>" />
      <button class="secondary" type="submit">Buscar</button>
      <a href="./alumnos.php" class="badge" style="align-self:center">limpiar</a>
    </form>

    <table>
      <thead>
        <tr>
          <th>DNI</th><th>Nombre</th><th>Apellidos</th><th>Población</th><th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($alumnos as $a): ?>
        <tr>
          <td><?= h($a['dni']) ?></td>
          <td><?= h($a['nombre']) ?></td>
          <td><?= h($a['apellidos']) ?></td>
          <td><?= h($a['poblacion']) ?></td>
          <td><a href="./alumnos.php?dni=<?= urlencode($a['dni']) ?>">ver/editar</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div>
    <h2 style="margin-top:0"><?= $selected ? 'Editar alumno' : 'Nuevo alumno' ?></h2>

    <form method="post">
      <input type="hidden" name="action" value="<?= $selected ? 'update' : 'create' ?>" />
      <label>DNI</label>
      <input name="dni" maxlength="8" value="<?= h($selected['dni'] ?? '') ?>" <?= $selected ? 'readonly' : '' ?> required />
      <label>Nombre</label>
      <input name="nombre" value="<?= h($selected['nombre'] ?? '') ?>" required />
      <label>Apellidos</label>
      <input name="apellidos" value="<?= h($selected['apellidos'] ?? '') ?>" required />
      <label>Teléfono</label>
      <input name="telefono" value="<?= h($selected['telefono'] ?? '') ?>" />
      <label>Población</label>
      <input name="poblacion" value="<?= h($selected['poblacion'] ?? '') ?>" required />

      <div class="actions" style="margin-top:12px">
        <button type="submit"><?= $selected ? 'Guardar cambios' : 'Crear alumno' ?></button>
        <?php if ($selected): ?>
          <a class="badge" href="./alumnos.php">nuevo</a>
        <?php endif; ?>
      </div>
    </form>

    <?php if ($selected): ?>
      <h3>Cursos matriculados</h3>
      <?php if (!$cursosAlumno): ?>
        <p><small class="muted">Este alumno no está matriculado en ningún curso.</small></p>
      <?php else: ?>
        <ul>
          <?php foreach ($cursosAlumno as $c): ?>
            <li><?= h($c['titulo']) ?> <span class="badge">#<?= (int)$c['codigo'] ?></span></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <form method="post" onsubmit="return confirm('¿Eliminar alumno y sus matrículas?')">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="dni" value="<?= h($selected['dni']) ?>" />
        <button class="danger" type="submit">Eliminar alumno</button>
      </form>
    <?php endif; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
$title = "Alumnos";
require __DIR__ . './../app/layout.php';
