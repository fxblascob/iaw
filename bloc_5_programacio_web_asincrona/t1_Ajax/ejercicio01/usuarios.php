<?php
// Simulación de datos desde una base de datos
$usuarios = [
    ["id" => 1, "nombre" => "Juan Pérez", "email" => "juan@example.com"],
    ["id" => 2, "nombre" => "María López", "email" => "maria@example.com"],
    ["id" => 3, "nombre" => "Carlos Sánchez", "email" => "carlos@example.com"],
];

echo "<ul>";
foreach ($usuarios as $usuario) {
    echo "<li>".$usuario['id']." - ".$usuario['nombre']." - ".$usuario['email']."</li>";
}
echo "</ul>";
?>