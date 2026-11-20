<?php
session_start();
require_once __DIR__ . '/../app/helpers.php';
require_once __DIR__ . '/../app/flash.php';
require_once __DIR__ . '/../app/repo/AlumnosRepo.php';
require_once __DIR__ . '/../app/repo/CursosRepo.php';
require_once __DIR__ . '/../app/repo/MatriculasRepo.php';

$action = $_POST['action'] ?? null;

try {
  if ($action === 'add') {
    $dni = trim($_POST['dni'] ?? '');
    $codigo = (int)($_POST['codigo'] ?? 0);

    if ($dni === '' || $codigo === 0) {
      flash_set('err', 'Selecciona alumno y curso');
      redirect('/matriculas.php');
    }

    if (matricula_exists($dni, $codigo)) {
      flash_set('err', 'Ese alumno ya está matriculado en ese curso');
      redirect('/matriculas.php?dni=' . urlencode($dni));
    }

    matriculas_add($dni, $codigo);
    flash_set('ok', 'Matrícula añadida');
    redirect('/matriculas.php?dni=' . urlencode($dni));
  }

  if ($action === 'remove') {
    $dni = trim($_POST['dni'] ?? '');
    $codigo = (int)($_POST['codigo'] ?? 0);
    matriculas_remove($dni, $codigo);
    flash_set('ok', 'Matrícula eliminada');
    redirect('/matriculas.php?dni=' . urlencode($dni));
  }
} catch (PDOException $e) {
  flash_set('err', 'Error DB: ' . $e->getMessage());
  redirect('/matriculas.php');
}

$alumnos = alumnos_all();
$cursos = cursos_all();

$selectedDni = trim($_GET['dni'] ?? '');
$selectedAlumno = $selectedDni ? alumnos_find($selectedDni) : null;
$cursosAlumno = $selectedAlumno ? cursos_de_alumno($selectedDni) : [];

ob_start();
?>
<h2 style="margin-top:0">Matrículas</h2>

<div class="grid">
  <div>
    <div class="card">
      <h3 style="margin-top:0">Añadir matrícula</h3>
      <form method="post">
        <input type="hidden" name="action" value="add" />
        <label>Alumno</label>
        <select name="dni" required>
          <option value="">-- Selecciona --</option>
          <?php foreach ($alumnos as $a): ?>
            <option value="<?= h($a['dni']) ?>" <?= $selectedDni === $a['dni'] ? 'selected' : '' ?>>
              <?= h($a['apellidos']) ?>, <?= h($a['nombre']) ?> (<?= h($a['dni']) ?>)
            </option>
          <?php endforeach; ?>
        </select>

        <label>Curso</label>
        <select name="codigo" required>
          <option value="">-- Selecciona --</option>
          <?php foreach ($cursos as $c): ?>
            <option value="<?= (int)$c['codigo'] ?>">
              <?= h($c['titulo']) ?> (#<?= (int)$c['codigo'] ?>)
            </option>
          <?php endforeach; ?>
        </select>

        <div class="actions" style="margin-top:12px">
          <button type="submit">Matricular</button>
        </div>
      </form>
      <p><small class="muted">Tip: selecciona un alumno para ver sus cursos debajo.</small></p>
    </div>

    <div style="margin-top:14px" class="card">
      <h3 style="margin-top:0">Ver cursos de un alumno</h3>
      <form method="get" class="actions">
        <select name="dni">
          <option value="">-- Selecciona --</option>
          <?php foreach ($alumnos as $a): ?>
            <option value="<?= h($a['dni']) ?>" <?= $selectedDni === $a['dni'] ? 'selected' : '' ?>>
              <?= h($a['apellidos']) ?>, <?= h($a['nombre']) ?> (<?= h($a['dni']) ?>)
            </option>
          <?php endforeach; ?>
        </select>
        <button class="secondary" type="submit">Ver</button>
      </form>
    </div>
  </div>

  <div>
    <div class="card">
      <h3 style="margin-top:0">Cursos del alumno</h3>
      <?php if (!$selectedAlumno): ?>
        <p><small class="muted">Selecciona un alumno para listar sus cursos.</small></p>
      <?php else: ?>
        <p><b><?= h($selectedAlumno['apellidos']) ?>, <?= h($selectedAlumno['nombre']) ?></b> <span class="badge"><?= h($selectedAlumno['dni']) ?></span></p>

        <?php if (!$cursosAlumno): ?>
          <p><small class="muted">No está matriculado en ningún curso.</small></p>
        <?php else: ?>
          <table>
            <thead>
              <tr><th>Curso</th><th>Lugar</th><th></th></tr>
            </thead>
            <tbody>
            <?php foreach ($cursosAlumno as $c): ?>
              <tr>
                <td><?= h($c['titulo']) ?> <span class="badge">#<?= (int)$c['codigo'] ?></span></td>
                <td><?= h($c['lugar_realizacion']) ?></td>
                <td>
                  <form method="post" style="display:inline" onsubmit="return confirm('¿Quitar matrícula?')">
                    <input type="hidden" name="action" value="remove" />
                    <input type="hidden" name="dni" value="<?= h($selectedAlumno['dni']) ?>" />
                    <input type="hidden" name="codigo" value="<?= (int)$c['codigo'] ?>" />
                    <button class="danger" type="submit">Quitar</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
$title = "Matrículas";
require __DIR__ . '/../app/layout.php';
