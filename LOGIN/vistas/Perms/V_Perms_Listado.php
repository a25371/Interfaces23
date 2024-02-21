<?php
$perms = $datos['perms'];

$json = json_encode($perms);
        echo 'PERMISOS USUARIO: <br>';
        echo $json;

// Dirty code para comprobar arrays anidados.
  //foreach ($perms as $permsItem) {
  //   echo "TITULO: " . $permsItem['PERMISO'];
    //  if (isset($menuItem['hijos'])) {
    //      echo '<br>';
    //      foreach ($menuItem['hijos'] as $hijoItem) {
    //          echo "------TITULO: " . $hijoItem['TITULO'];
    //          echo '<br>';
    //      }
    //      echo 'FIN--' . $menuItem['TITULO'];
    //      echo '<br>';
    //  }
 //}  