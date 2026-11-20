<?php
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/flash.php';
$flash = flash_get();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= h($title ?? 'Academia') ?></title>
  <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
  <div class="container">
    <div class="card">
      <h1 style="margin:0 0 8px">Mini Academia</h1>
      <div class="nav">
        <a class="<?= active('./') ?>" href="./">Inicio</a>
        <a class="<?= active('./alumnos.php') ?>" href="./alumnos.php">Alumnos</a>
        <a class="<?= active('./cursos.php') ?>" href="./cursos.php">Cursos</a>
        <a class="<?= active('./matriculas.php') ?>" href="./matriculas.php">Matrículas</a>
      </div>

      <?php if ($flash): ?>
        <div class="flash <?= $flash['type']==='ok'?'ok':'err' ?>"><?= h($flash['msg']) ?></div>
      <?php endif; ?>

      <?= $content ?? '' ?>
      <hr style="border:0;border-top:1px solid #eee;margin:16px 0" />
    </div>
  </div>
</body>
</html>
