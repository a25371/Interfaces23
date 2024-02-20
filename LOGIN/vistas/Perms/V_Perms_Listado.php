<?php

echo 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA';


// Dirty code para comprobar arrays anidados.
  foreach ($datos['MenuData'] as $menuItem) {
     echo "TITULO: " . $menuItem['TITULO'] . '||' . "PRIVACIDAD: " . $menuItem['PRIVADO'];
     if (isset($menuItem['hijos'])) {
         echo '<br>';
         foreach ($menuItem['hijos'] as $hijoItem) {
             echo "------TITULO: " . $hijoItem['TITULO'];
             echo '<br>';
         }
         echo 'FIN--' . $menuItem['TITULO'];
         echo '<br>';
     }
 }  