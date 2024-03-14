<?php
$perms = $datos['perms']['perms'];
$PUser = $datos['perms']['PUser'];
$PRol = $datos['perms']['PRol'];

// if (strlen(trim($PRol)) > 0) {
//         echo "PRol has content other than whitespace";
// } else {
//         echo "PRol is empty or not set";
// }



// TODO:
// If nothing on fields, normal list.
// If user or rol set, remove ALL BUTTONS and instead put a checkmark.
// If both user and rol set, give FAT RED ERROR
        // Further improvement: Fields are auto-complete

// Checkmark specs: Default value read from session, modify on the fly (onclick)


// Ordenamos por 'orden' para que copie el menu.
usort($perms, function ($a, $b) {
        return $a[0]['orden'] - $b[0]['orden'];
});

echo "<div class='child' id='ListaPerms'>";
foreach ($perms as $id_menu => $permisos) {
        echo "<div class='Caja' id= 'CajaMenu'>";
        echo "<div id= 'patata'>";
        echo "<p>{$permisos[0]['titulo']} || con ID: {$permisos[0]['id_menu']}</p>";

        if (strlen(trim($PRol)) > 0) {
        } else if (strlen(trim($PUser)) > 0) {
        } else {
                echo "<div id= 'BotonesMenu'>";
                if (!isset($permisos['hijos'])) {
                        echo '<td><button class="PermsBoton" onclick="getInsertSubMenu(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/add.png"></button></td>';
                }
                echo '<td><button class="PermsBoton" onclick="getUpdateMenu(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/option.png"></button></td>';
                echo '<td><button class="PermsBoton" onclick="getDeleteMenu(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/eckis.png"></button></td>';
                echo "</div>";
                // Botones del padre (ID menu)
                echo "<div id= 'CajaBtn'>"; //Creamos nuevo permiso para el menu
                echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                echo "</div>";
        }
        echo "</div>";
        // Datos del padre
        foreach ($permisos as $permiso) {
                // Existe la clave 'permiso' en el array $permiso?
                if (!isset($permiso['permiso'])) {
                        continue; // Si no existe, es un hijo, no lo mostramos.
                }
                echo "<div class='Caja' id='CajaPadres'>";
                echo "<p>Permiso: {$permiso['permiso']}</p>";
                if (strlen(trim($PRol)) > 0) {
                        echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsProl(' . $permiso['id_permiso'] .", ". $PRol . ')">';
                } else if (strlen(trim($PUser)) > 0) {
                        echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsPUser(' . $permiso['id_permiso'] .", ". $PUser . ')">';
                } else {
                        echo "<div id='CajaBtn'>"; // Editamos o eliminamos un permiso
                        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $permiso['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $permiso['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
                        echo "</div>";
                }
                echo "</div>"; // Cerrar CajaPadre
        }
        // Tenemos hijos?
        if (isset($permisos['hijos'])) {
                if (strlen(trim($PRol)) > 0) {
                } else if (strlen(trim($PUser)) > 0) {
                } else {
                        echo '<td><button class="PermsBoton" onclick="getInsertSubMenu(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/add.png"></button></td>';
                }
                foreach ($permisos['hijos'] as $id_menu_hijo => $hijos) {
                        // Los hijos tambien son menus
                        echo "<div class='Caja' id= 'CajaMenu'>";
                        echo "<div id= 'patata'>";
                        echo "<p>{$hijos[0]['titulo']} || con ID: $id_menu_hijo</p>";

                        if (strlen(trim($PRol)) > 0) {
                        } else if (strlen(trim($PUser)) > 0) {
                        } else {
                                echo "<div id= 'BotonesMenu'>";
                                echo '<td><button class="PermsBoton" onclick="getUpdateMenu(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/option.png"></button></td>';
                                echo '<td><button class="PermsBoton" onclick="getDeleteMenu(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/eckis.png"></button></td>';
                                echo "</div>";
                                // Botones del hijo
                                echo "<div id= 'CajaBtn'>"; //Creamos nuevo permiso para el menu del hijo
                                echo '<td><button class="PermsBoton" onclick="getInsertPerms(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/create.png"></button></td>';
                                echo "</div>";
                        }
                        echo "</div>";
                        // Los datos del hijo
                        foreach ($hijos as $hijo) {
                                echo "<div class='Caja' id= 'CajaHijos'>";
                                echo "<p>Permiso: {$hijo['permiso']}</p>";
                                if (strlen(trim($PRol)) > 0) {
                                        echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsProl(' . $hijo['id_permiso'] .", ". $PRol . ')">';
                                } else if (strlen(trim($PUser)) > 0) {
                                        echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsPUser(' . $hijo['id_permiso'] .", ". $PUser . ')">';
                                } else {
                                        echo "<div id= 'CajaBtn'>"; // Editamos o eliminamos un permiso
                                        echo '<td><button class="PermsBoton" onclick="getUpdatePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/edit.png"></button></td>';
                                        echo '<td><button class="PermsBoton" onclick="getDeletePerms(' . $hijo['id_permiso'] . ')"><img class="PermsImagen" src="img/delete.png"></button></td>';
                                        echo "</div>";
                                }
                                echo "</div>";
                        }
                        echo "</div>"; // Cerrar CajaMenu para el hijo
                        if (strlen(trim($PRol)) > 0) {
                        } else if (strlen(trim($PUser)) > 0) {
                        } else {
                                echo '<td><button class="PermsBoton" onclick="getInsertMenu(' . $id_menu_hijo . ')"><img class="PermsImagen" src="img/add.png"></button></td>';
                        }
                }
        }
        echo "</div>"; // Cerrar CajaMenu para el padre
        if (strlen(trim($PRol)) > 0) {
        } else if (strlen(trim($PUser)) > 0) {
        } else {
                echo '<td><button class="PermsBoton" onclick="getInsertMenu(' . $permisos[0]['id_menu'] . ')"><img class="PermsImagen" src="img/add.png"></button></td>';
        }
}
echo "</div>";
echo "<div class='child' id='OpcionesPerms'></div>";