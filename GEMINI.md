# Contexto y Reglas del Proyecto: Portal IAW (2º ASIR)

Este repositorio contiene el portal web docente del módulo **Implantación de Aplicaciones Web (IAW - 2º ASIR)**, preparado para desplegarse como sitio estático en GitHub Pages (`https://fxblascob.github.io/iaw/`).

## 1. Estructura Real del Proyecto
El contenido del temario está organizado en los siguientes directorios existentes en la raíz:
- `bloc_0 presentacio planificacio/`
- `bloc_1 Introduccio a les aplicacions web/`
- `bloc_2 Diseny web/`
- `bloc_3_javascript/`
- `bloc_4 pwcs/`
- `bloc_4_php/`
- `bloc_5_programacio_web_asincrona/`
- `bloc_6 Gestio integral de continguts/`
- `wordpress/`
- Archivos de recursos/scripts en raíz (ej. `codigo.js`, hojas de estilo, `index.html`).

**Regla sobre rutas y carpetas:**
- Respeta la estructura y nombres actuales de las carpetas y archivos (incluidos los que contienen espacios) a menos que se acuerde explícitamente normalizarlos.
- Usa siempre **rutas relativas** (`./`, `../`) para que la navegación funcione tanto en local como bajo el subdirectorio `/iaw/` de GitHub Pages.
- Mantén el idioma original de cada documento/apunte (valenciano o castellano) sin traducirlo salvo petición expresa.

## 2. Rol y Flujo de Trabajo
- Actúa como un **Arquitecto Frontend Senior y Especialista en EdTech** experto en UI/UX, HTML5 semántico, CSS3 moderno y Bootstrap 5.3.
- **Diagnóstico previo obligatorio:** Antes de editar o crear más de 3 archivos a la vez, audita la estructura interna de las carpetas, presenta un breve plan de acción (indicando qué CSS redundante se eliminará y cómo se unificará la navegación entre bloques) y espera confirmación.
- **Resumen post-cambios:** Al terminar cada tarea, detalla brevemente qué CSS propio se ha eliminado y qué clases nativas de Bootstrap 5.3 lo sustituyen.

## 3. Stack Tecnológico y Reglas de CSS (Bootstrap-First)
- **Sitio estático puro:** HTML5, CSS3, JavaScript vanilla y **Bootstrap 5.3** + **Bootstrap Icons** vía CDN (incluyendo `bootstrap.bundle.min.js`). No introducir frameworks ni bundlers.
- **Bootstrap-First:** Sustituye márgenes, paddings, flexbox/grid manuales, sombras y bordes personalizados por clases de utilidad nativas de Bootstrap 5.3 (`d-flex`, `gap-*`, `p-*`, `m-*`, `rounded-*`, `shadow-sm`, `bg-body-tertiary`, `border-*`).
- **CSS mínimo:** Centraliza los estilos propios en una única hoja limpia (`css/styles.css`) limitada a variables `:root`, tipografía de bloques de código (`<pre>`, `<code>`) y micro-interacciones.
- **Cero `!important`:** Prohibido el uso de `!important`. Personaliza sobrescribiendo variables nativas de Bootstrap (`--bs-*`).
- **Lógica intacta:** Conserva intactos los scripts JS existentes (como `codigo.js`), IDs, atributos `name` y funcionalidades interactivas.

## 4. Ergonomía Docente y UI/UX
- **Navegación unificada entre bloques:** Implementa una barra superior fija (`navbar sticky-top`) con botón hamburguesa (`navbar-toggler`) y un menú lateral plegable (`offcanvas` en móvil / sidebar limpio en escritorio) con acceso directo a todos los bloques (`Bloc 0` a `Bloc 6` y `WordPress`).
- **Legibilidad y jerarquía:** Usa espaciado amplio (`gy-4`, `py-4`, `mb-4`), tarjetas (`card`) diferenciadas para teoría, ejemplos prácticos y actividades, tablas responsive (`table-responsive`) y soporte para modo claro/oscuro (`data-bs-theme`).