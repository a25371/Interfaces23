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
        echo "<div class='Caja' id= 'CajaMenu'>";
        echo "<li>$id_menu: {$permisos['titulo']}<ul>";

        // Boton del padre
        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
        // Datos del padre
        echo "<div class='Caja' id= 'CajaPadres'>";
        echo "<li>Permiso ID: {$permisos['id_permiso']}, Permiso: {$permisos['permiso']}</li>";
        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
        // Tenemos hijos?
        if (isset($permisos['hijos'])) {
                foreach ($permisos['hijos'] as $id_menu_hijo => $hijos) {
                        // Los hijos tambien son menus
                        echo "<div class='Caja' id= 'CajaMenu'>";
                        echo "<li>$id_menu_hijo: {$hijos[0]['titulo']}<ul>";

                        // Boton del hijo
                        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';

                        // Los datos del hijo
                        foreach ($hijos as $hijo) {
                                echo "<div class='Caja' id= 'CajaHijos'>";
                                echo "<li>{$hijo['titulo']} || ID: {$hijo['id_permiso']} - {$hijo['permiso']}</li>";
                                echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                                echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                                echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
                                echo "</div>";
                        }
                        echo "</ul></li>";
                        echo "</div>"; // Cerrar CajaMenu para el hijo
                }
        }
        echo "</div>"; // Cerrar CajaPadre
        echo "</div>"; // Cerrar CajaMenu para el padre
}
echo "</ul>";
echo "<div id='capaEditarPerms'></div>";
echo "<div id='capaInsertPerms'></div>";
