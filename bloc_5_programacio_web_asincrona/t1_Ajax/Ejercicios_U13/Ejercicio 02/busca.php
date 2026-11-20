<?php
   if (!empty($_REQUEST['texto']))
   {
      $texto = strtolower($_REQUEST['texto']);
      $datos = file('usuarios.txt');
      echo '<ul>';
      foreach ($datos as $usuario)
      {
         $usulow = strtolower($usuario);
         if (strpos($usulow, $texto) !== FALSE)
         	echo "<li>$usuario</li>";
      }
      echo '</ul>';
   }
?>