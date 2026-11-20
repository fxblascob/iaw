<?php
session_start();
require_once __DIR__ . './../app/helpers.php';
require_once __DIR__ . './../app/flash.php';
require_once __DIR__ . './../app/repo/CursosRepo.php';
require_once __DIR__ . './../app/repo/MatriculasRepo.php';

$action = $_POST['action'] ?? $_GET['action'] ?? null;

try {
  if ($action === 'create') {
    cursos_create([
      'titulo' => trim($_POST['titulo'] ?? ''),
      'n_plazas' => (int)($_POST['n_plazas'] ?? 0),
      'precio' => (int)($_POST['precio'] ?? 0),
      'lugar_realizacion' => trim($_POST['lugar_realizacion'] ?? ''),
    ]);
    flash_set('ok', 'Curso creado');
    redirect('./cursos.php');
  }

  if ($action === 'update') {
    $codigo = (int)($_POST['codigo'] ?? 0);
    cursos_update($codigo, [
      'titulo' => trim($_POST['titulo'] ?? ''),
      'n_plazas' => (int)($_POST['n_plazas'] ?? 0),
      'precio' => (int)($_POST['precio'] ?? 0),
      'lugar_realizacion' => trim($_POST['lugar_realizacion'] ?? ''),
    ]);
    flash_set('ok', 'Curso actualizado');
    redirect('./cursos.php?codigo=' . $codigo);
  }

  if ($action === 'delete') {
    $codigo = (int)($_POST['codigo'] ?? 0);
    cursos_delete($codigo);
    flash_set('ok', 'Curso eliminado (y sus matrículas)');
    redirect('./cursos.php');
  }
} catch (PDOException $e) {
  flash_set('err', 'Error DB: ' . $e->getMessage());
  redirect('./cursos.php');
}

$q = trim($_GET['q'] ?? '');
$cursos = $q !== '' ? cursos_search($q) : cursos_all();

$selectedCodigo = isset($_GET['codigo']) ? (int)$_GET['codigo'] : 0;
$selected = $selectedCodigo ? cursos_find($selectedCodigo) : null;
$alumnosCurso = $selected ? alumnos_de_curso($selectedCodigo) : [];

ob_start();
?>
<div class="grid">
  <div>
    <h2 style="margin-top:0">Cursos</h2>

    <form method="get" class="actions" style="margin-bottom:10px">
      <input name="q" placeholder="Buscar por título o lugar" value="<?= h($q) ?>" />
      <button class="secondary" type="submit">Buscar</button>
      <a href="./cursos.php" class="badge" style="align-self:center">limpiar</a>
    </form>

    <table>
      <thead>
        <tr>
          <th>Código</th><th>Título</th><th>Plazas</th><th>Precio</th><th>Lugar</th><th></th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($cursos as $c): ?>
        <tr>
          <td><?= (int)$c['codigo'] ?></td>
          <td><?= h($c['titulo']) ?></td>
          <td><?= (int)$c['n_plazas'] ?></td>
          <td><?= (int)$c['precio'] ?>€</td>
          <td><?= h($c['lugar_realizacion']) ?></td>
          <td><a href="./cursos.php?codigo=<?= (int)$c['codigo'] ?>">ver/editar</a></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <div>
    <h2 style="margin-top:0"><?= $selected ? 'Editar curso' : 'Nuevo curso' ?></h2>

    <form method="post">
      <input type="hidden" name="action" value="<?= $selected ? 'update' : 'create' ?>" />
      <?php if ($selected): ?>
        <label>Código</label>
        <input name="codigo" value="<?= (int)$selected['codigo'] ?>" readonly />
      <?php endif; ?>

      <label>Título</label>
      <input name="titulo" value="<?= h($selected['titulo'] ?? '') ?>" required />

      <label>Nº plazas</label>
      <input name="n_plazas" type="number" min="0" value="<?= h((string)($selected['n_plazas'] ?? 0)) ?>" required />

      <label>Precio</label>
      <input name="precio" type="number" min="0" value="<?= h((string)($selected['precio'] ?? 0)) ?>" required />

      <label>Lugar realización</label>
      <input name="lugar_realizacion" value="<?= h($selected['lugar_realizacion'] ?? '') ?>" required />

      <div class="actions" style="margin-top:12px">
        <button type="submit"><?= $selected ? 'Guardar cambios' : 'Crear curso' ?></button>
        <?php if ($selected): ?>
          <a class="badge" href="./cursos.php">nuevo</a>
        <?php endif; ?>
      </div>
    </form>

    <?php if ($selected): ?>
      <h3>Alumnos matriculados</h3>
      <?php if (!$alumnosCurso): ?>
        <p><small class="muted">No hay alumnos matriculados en este curso.</small></p>
      <?php else: ?>
        <ul>
          <?php foreach ($alumnosCurso as $a): ?>
            <li><?= h($a['apellidos']) ?>, <?= h($a['nombre']) ?> <span class="badge"><?= h($a['dni']) ?></span></li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>

      <form method="post" onsubmit="return confirm('¿Eliminar curso y sus matrículas?')">
        <input type="hidden" name="action" value="delete" />
        <input type="hidden" name="codigo" value="<?= (int)$selected['codigo'] ?>" />
        <button class="danger" type="submit">Eliminar curso</button>
      </form>
    <?php endif; ?>
  </div>
</div>
<?php
$content = ob_get_clean();
$title = "Cursos";
require __DIR__ . './../app/layout.php';
