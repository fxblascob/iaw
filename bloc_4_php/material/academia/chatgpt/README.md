# Mini Academia (PHP)

Proyecto mínimo para mantenimiento de:
- **alumnos**
- **cursos**
- **matriculas** (relación muchos-a-muchos)

## 1) Requisitos
- PHP 7.4+ (vale 8.x)
- MySQL/MariaDB
- Extensión PDO MySQL habilitada

## 2) Cargar base de datos
Importa tu `academia.sql` en MySQL (phpMyAdmin o consola).

## 3) Configurar conexión
Edita: `app/config.php`

## 4) Ejecutar
Desde la carpeta del proyecto:

```bash
php -S localhost:8000 -t public
```

Abre:
- http://localhost:8000

## Notas
- Al borrar un alumno/curso se eliminan primero sus filas en `matriculas` (borrado en cascada manual).
- Se usan `prepare` para evitar SQL injection.
