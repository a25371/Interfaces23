<?php
$usuarios = $datos['usuarios'];
//$json = json_encode($usuarios);
//echo $json;

echo '<table>';
echo '<tr><th>Nombre</th><th>Login</th></tr>';
foreach ($usuarios as $fila) {
    $nombreCompleto = $fila['nombre']. ' ' . $fila['apellido_1'] . ' ' . $fila['apellido_2'];
    echo '<tr>';
    echo '<td>' . $nombreCompleto . '</td>';
    echo '<td>' . $fila['login'] . '</td>';
    echo '<td><button class="editButton" id="UpdateButton"
        onclick="getUpdateUsuario(' . $fila['id_Usuario'] . ')">Editar Usuario</button></td>';
    echo '</tr>';
}
echo '</table>';
