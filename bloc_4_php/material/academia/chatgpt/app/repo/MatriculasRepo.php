<?php
require_once __DIR__ . './../db.php';

function matriculas_add(string $dni, int $codigo): void {
  $st = db()->prepare("INSERT INTO matriculas (dni,codigo) VALUES (?,?)");
  $st->execute([$dni,$codigo]);
}
function matriculas_remove(string $dni, int $codigo): void {
  $st = db()->prepare("DELETE FROM matriculas WHERE dni=? AND codigo=?");
  $st->execute([$dni,$codigo]);
}
function cursos_de_alumno(string $dni): array {
  $st = db()->prepare("
    SELECT c.*
    FROM cursos c
    JOIN matriculas m ON m.codigo = c.codigo
    WHERE m.dni = ?
    ORDER BY c.titulo
  ");
  $st->execute([$dni]);
  return $st->fetchAll();
}
function alumnos_de_curso(int $codigo): array {
  $st = db()->prepare("
    SELECT a.*
    FROM alumnos a
    JOIN matriculas m ON m.dni = a.dni
    WHERE m.codigo = ?
    ORDER BY a.apellidos, a.nombre
  ");
  $st->execute([$codigo]);
  return $st->fetchAll();
}
function matricula_exists(string $dni, int $codigo): bool {
  $st = db()->prepare("SELECT 1 FROM matriculas WHERE dni=? AND codigo=?");
  $st->execute([$dni,$codigo]);
  return (bool)$st->fetchColumn();
}
