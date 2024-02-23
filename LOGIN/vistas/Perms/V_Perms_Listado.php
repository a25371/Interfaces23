<?php
$perms = $datos['perms'];

// $json = json_encode($perms);
//         echo 'PERMISOS USUARIO: <br>';
//         echo $json;

// Ordenamos por 'orden' para que copie el menu.
usort($perms, function ($a, $b) {
        return $a['orden'] - $b['orden'];
});

echo "Permisos:<br>";
echo "<ul>";
foreach ($perms as $id_menu => $permisos) {
        echo "<div class='CajaMenu'>";
        echo "<li>$id_menu: {$permisos['titulo']}<ul>";
        echo "<div class='CajaPadres'>";
        echo "<li>Permiso ID: {$permisos['id_permiso']}, Permiso: {$permisos['permiso']}</li>";
        // Tenemos hijos?
        if (isset($permisos['hijos'])) {
                foreach ($permisos['hijos'] as $id_menu_hijo => $hijos) {
                        // Mostramos los hijos por id_menu
                        echo "<div class='CajaHijos'>";
                        foreach ($hijos as $hijo) {
                                echo "<li>{$id_menu_hijo}: {$hijo['titulo']}  ||  ID: {$hijo['id_permiso']} - {$hijo['permiso']}</li>";
                        }
                        echo "</div>";
                }
        }
        echo "</div>";
        echo "</div>";
        echo "<div id='capaEditarPerms'></div>";
}
echo "</ul></li>";
echo "</ul>";