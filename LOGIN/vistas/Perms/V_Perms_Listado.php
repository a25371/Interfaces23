<?php
$perms = $datos['perms'];

// $json = json_encode($perms);
//         echo 'PERMISOS USUARIO: <br>';
//         echo $json;

// Ordenamos por 'orden' para que copie el menu.
usort($perms, function ($a, $b) {
        return $a['orden'] - $b['orden'];
});

echo "<div class='child' id='ListaPerms'>";
foreach ($perms as $id_menu => $permisos) {
        echo "<div class='Caja' id= 'CajaMenu'>";
        echo "<div id= 'patata'>";
        echo "<p>{$permisos['titulo']}</p>";

        // Botones del padre
        echo "<div id= 'CajaBtn'>";
        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
        echo "</div>";
        echo "</div>";
        // Datos del padre
        echo "<div class='Caja' id= 'CajaPadres'>";
        echo "<p>Permiso: {$permisos['permiso']}</p>";
        echo "<div id= 'CajaBtn'>";
        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $permisos['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
        echo "</div>";
        echo "</div>"; // Cerrar CajaPadre
        // Tenemos hijos?
        if (isset($permisos['hijos'])) {
                foreach ($permisos['hijos'] as $id_menu_hijo => $hijos) {
                        // Los hijos tambien son menus
                        echo "<div class='Caja' id= 'CajaMenu'>";
                        echo "<div id= 'patata'>";
                        echo "<p>{$hijos[0]['titulo']}</p>";

                        // Botones del hijo
                        echo "<div id= 'CajaBtn'>";
                        echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
                        echo "</div>";
                        echo "</div>";
                        // Los datos del hijo
                        foreach ($hijos as $hijo) {
                                echo "<div class='Caja' id= 'CajaHijos'>";
                                echo "<p>{$hijo['titulo']} || {$hijo['permiso']}</p>";
                                echo "<div id= 'CajaBtn'>";
                                echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                                echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                                echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
                                echo "</div>";
                                echo "</div>";
                        }
                        echo "</div>"; // Cerrar CajaMenu para el hijo
                }
        }
        echo "</div>"; // Cerrar CajaMenu para el padre
}
echo "</div>";
echo "<div class='child' id='Opciones'>";
echo "<div id='capaEditarPerms'></div>";
echo "<div id='capaInsertPerms'></div>";
echo "</div>";
