<?php
require_once __DIR__ . './../db.php';

function alumnos_all(): array {
  return db()->query("SELECT * FROM alumnos ORDER BY apellidos, nombre")->fetchAll();
}
function alumnos_find(string $dni): ?array {
  $st = db()->prepare("SELECT * FROM alumnos WHERE dni=?");
  $st->execute([$dni]);
  $r = $st->fetch();
  return $r ?: null;
}
function alumnos_create(array $a): void {
  $st = db()->prepare("INSERT INTO alumnos (dni,nombre,apellidos,telefono,poblacion) VALUES (?,?,?,?,?)");
  $st->execute([$a['dni'],$a['nombre'],$a['apellidos'],$a['telefono'] ?: null,$a['poblacion']]);
}
function alumnos_update(string $dni, array $a): void {
  $st = db()->prepare("UPDATE alumnos SET nombre=?, apellidos=?, telefono=?, poblacion=? WHERE dni=?");
  $st->execute([$a['nombre'],$a['apellidos'],$a['telefono'] ?: null,$a['poblacion'],$dni]);
}
function alumnos_delete(string $dni): void {
  db()->prepare("DELETE FROM matriculas WHERE dni=?")->execute([$dni]);
  db()->prepare("DELETE FROM alumnos WHERE dni=?")->execute([$dni]);
}
function alumnos_search(string $q): array {
  $q = "%$q%";
  $st = db()->prepare("SELECT * FROM alumnos WHERE dni LIKE ? OR nombre LIKE ? OR apellidos LIKE ? ORDER BY apellidos,nombre");
  $st->execute([$q,$q,$q]);
  return $st->fetchAll();
}
