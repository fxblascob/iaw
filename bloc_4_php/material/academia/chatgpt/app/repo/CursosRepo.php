<?php
require_once __DIR__ . './../db.php';

function cursos_all(): array {
  return db()->query("SELECT * FROM cursos ORDER BY titulo")->fetchAll();
}
function cursos_find(int $codigo): ?array {
  $st = db()->prepare("SELECT * FROM cursos WHERE codigo=?");
  $st->execute([$codigo]);
  $r = $st->fetch();
  return $r ?: null;
}
function cursos_create(array $c): void {
  $st = db()->prepare("INSERT INTO cursos (titulo,n_plazas,precio,lugar_realizacion) VALUES (?,?,?,?)");
  $st->execute([$c['titulo'], (int)$c['n_plazas'], (int)$c['precio'], $c['lugar_realizacion']]);
}
function cursos_update(int $codigo, array $c): void {
  $st = db()->prepare("UPDATE cursos SET titulo=?, n_plazas=?, precio=?, lugar_realizacion=? WHERE codigo=?");
  $st->execute([$c['titulo'], (int)$c['n_plazas'], (int)$c['precio'], $c['lugar_realizacion'], $codigo]);
}
function cursos_delete(int $codigo): void {
  db()->prepare("DELETE FROM matriculas WHERE codigo=?")->execute([$codigo]);
  db()->prepare("DELETE FROM cursos WHERE codigo=?")->execute([$codigo]);
}
function cursos_search(string $q): array {
  $q = "%$q%";
  $st = db()->prepare("SELECT * FROM cursos WHERE titulo LIKE ? OR lugar_realizacion LIKE ? ORDER BY titulo");
  $st->execute([$q,$q]);
  return $st->fetchAll();
}
