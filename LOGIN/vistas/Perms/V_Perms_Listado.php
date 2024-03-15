<?php
$perms = $datos['perms']['perms'];
$PUser = $datos['perms']['PUser'];
$PRol = $datos['perms']['PRol'];
$permsMod = $datos['perms']['permsMod'];

if (strlen(trim($PRol)) > 0 && strlen(trim($PUser)) > 0) {      //Si ambos tienen texto
        echo "ERROR, NO SE PUEDEN BUSCAR AMBOS FIELDS A LA VEZ!!!!";
}else if ((strlen(trim($PRol)) > 0 || strlen(trim($PUser)) > 0) && (empty($permsMod) || count($permsMod) === 0)) {
        echo "Error, la busqueda ha fallado.";
} else{

// TODO:
// If nothing on fields, normal list. X
// If user or rol set, remove ALL BUTTONS and instead put a checkmark.   X
        //Set checkmark depending on if perms id are in permsMod or not  X
// If both user and rol set, give FAT RED ERROR                          X
        // Further improvement: Fields are auto-complete

// Checkmark specs: Default value read from session, modify on the fly (onclick)        X
        //Update function takes Perm ID, then name of user/rol given                    X

$flatPermsMod = array();
// reducimos PermsMod (multidimensional) a un array plano
foreach ($permsMod as $perm) {
    $flatPermsMod[] = $perm['id_permiso'];
}

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
                        if (in_array($permiso['id_permiso'], $flatPermsMod)) {
                                // Si el numero esta en PermsMod, check
                                echo '<input type="checkbox" id="PermsCheckbox" checked onchange="updatePermsProl(this.checked ? 1 : 0, ' . $permiso['id_permiso'] . ', \'' . $PRol . '\')">'; 
                        } else {
                                // Si el numero esta en PermsMod, uncheck
                                echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsProl(this.checked ? 1 : 0, ' . $permiso['id_permiso'] . ', \'' . $PRol . '\')">'; 

                        }
                } else if (strlen(trim($PUser)) > 0) {
                        if (in_array($permiso['id_permiso'], $flatPermsMod)) {
                                // Si el numero esta en PermsMod, check
                                echo '<input type="checkbox" id="PermsCheckbox" checked onchange="updatePermsPUser(this.checked ? 1 : 0, ' . $permiso['id_permiso'] . ', \'' . $PUser . '\')">'; 

                        } else {
                                // Si el numero esta en PermsMod, uncheck
                                echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsPUser(this.checked ? 1 : 0, ' . $permiso['id_permiso'] . ', \'' . $PUser . '\')">'; 
                        }
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
                                        if (in_array($hijo['id_permiso'], $flatPermsMod)) {
                                                // Si el numero esta en PermsMod, check
                                                echo '<input type="checkbox" id="PermsCheckbox" checked onchange="updatePermsProl(this.checked ? 1 : 0, ' . $hijo['id_permiso'] . ', \'' . $PRol . '\')">';
                                        } else {
                                                // Si el numero esta en PermsMod, uncheck
                                                echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsProl(this.checked ? 1 : 0, ' . $hijo['id_permiso'] . ', \'' . $PRol . '\')">';
                                        }
                                } else if (strlen(trim($PUser)) > 0) {
                                        if (in_array($hijo['id_permiso'], $flatPermsMod)) {
                                                // Si el numero esta en PermsMod, check
                                                echo '<input type="checkbox" id="PermsCheckbox" checked onchange="updatePermsPUser(this.checked ? 1 : 0, ' . $hijo['id_permiso'] . ', \'' . $PUser . '\')">'; 
                                        } else {
                                                // Si el numero esta en PermsMod, uncheck
                                                echo '<input type="checkbox" id="PermsCheckbox" onchange="updatePermsPUser(this.checked ? 1 : 0, ' . $hijo['id_permiso'] . ', \'' . $PUser . '\')">';
                                        }
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
}