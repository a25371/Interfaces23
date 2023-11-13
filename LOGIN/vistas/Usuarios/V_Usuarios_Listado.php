<?php
    $usuarios = $datos['usuarios'];

    //$json = json_encode($usuarios);
    //echo $json;

    echo '<table>';
    echo '<tr><th>Apellido 1</th><th>Apellido 2</th><th>Nombre</th><th>Login</th></tr>';
    foreach ($usuarios as $fila) {
        echo '<tr>';
        echo '<td>' . $fila['apellido_1'] . '</td>';
        echo '<td>' . $fila['apellido_2'] . '</td>';
        echo '<td>' . $fila['nombre'] . '</td>';
        echo '<td>' . $fila['login'] . '</td>';
        echo '<td><button class="editButton"
        onclick="editarUsuario(' . $fila['id_Usuario'] . ')">Editar Usuario</button></td>';
        echo '</tr>';
    }
    echo '</table>';
?>



