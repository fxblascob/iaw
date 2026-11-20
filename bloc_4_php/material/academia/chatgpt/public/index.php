<?php
session_start();
$title = "Inicio";
$content = '<p>Proyecto mínimo para mantenimiento de <b>alumnos</b>, <b>cursos</b> y la relación N:M (<b>matriculas</b>).</p>
<div class="grid">
  <div class="card">
    <h3 style="margin-top:0">Qué incluye</h3>
    <ul>
      <li>CRUD Alumnos</li>
      <li>CRUD Cursos</li>
      <li>Matricular / desmatricular</li>
      <li>Listar cursos de un alumno y alumnos de un curso</li>
      <li>Búsquedas simples</li>
    </ul>
  </div>
  <div class="card">
    <h3 style="margin-top:0">Cómo arrancar</h3>
    <ol>
      <li>Importa tu SQL (academia.sql) en MySQL.</li>
      <li>Edita <code>app/config.php</code> con usuario/clave.</li>
      <li>Arranca servidor: <code>php -S localhost:8000 -t public</code></li>
    </ol>
  </div>
</div>';
require __DIR__ . '/../app/layout.php';
