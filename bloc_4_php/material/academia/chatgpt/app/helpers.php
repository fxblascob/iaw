<?php
function h(?string $s): string { return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }
function redirect(string $path): void { header("Location: $path"); exit; }
function active(string $path): string {
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  return ($uri === $path) ? 'active' : '';
}
