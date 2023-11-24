<?php
$datosUser = $datos['datosUser'];
//echo '<pre>'; print_r($datosUser); echo '</pre>';
//$json = json_encode($datos);
//    echo $json;
?>
<hr>
<form class="formulario" id="formularioUpdate" name="formularioCrear" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <label for="n_texto">Nombre:</label>
        <input type="text" id="n_texto" name="n_texto" value="<?php echo $datosUser[0]['nombre']; ?>">
        <label for="a1_texto">Apellido 1:</label>
        <input type="text" id="a1_texto" name="a1_texto" value="<?php echo $datosUser[0]['apellido_1']; ?>">
        <label for="a2_texto">Apellido 2:</label>
        <input type="text" id="a2_texto" name="a2_texto" value="<?php echo $datosUser[0]['apellido_2']; ?>">
    </div>
    <div class="crear-column">
        <label for="ma_texto">Email:</label>
        <input type="text" id="ma_texto" name="ma_texto" value="<?php echo $datosUser[0]['mail']; ?>">
        <label for="mo_texto">Movil:</label>
        <input type="text" id="mo_texto" name="mo_texto" value="<?php echo $datosUser[0]['movil']; ?>">
        <label for="fecha_Alta">Fecha de Alta:</label>
        <input type="date" id="fecha_Alta" name="fecha_Alta" value="<?php echo $datosUser[0]['fecha_Alta']; ?>">
        
    </div>
    <div class="crear-column" id="updateSelectors">
        <label for="g_texto">Género:</label>
        <select id="g_texto" name="g_texto">
            <option value=""  <?php if ($datosUser[0]['sexo'] == '') echo 'selected="selected"'; ?>>None</option>
            <option value="H" <?php if ($datosUser[0]['sexo'] == 'H') echo 'selected="selected"'; ?>>H</option>
            <option value="M" <?php if ($datosUser[0]['sexo'] == 'M') echo 'selected="selected"'; ?>>M</option>
        </select>
        <label for="activo">Activo:</label>
        <select id="activo" name="activo">
            <option value="S" <?php if ($datosUser[0]['activo'] == 'S') echo 'selected="selected"'; ?>>S</option>
            <option value="N" <?php if ($datosUser[0]['activo'] == 'N') echo 'selected="selected"'; ?>>N</option>
        </select>
    </div>
    <div class="update-column">
    <input type="hidden" id="id_Usuario" name="id_Usuario" value="<?php echo $datosUser[0]['id_Usuario']; ?>">
        <button type="button" id="button-update" onclick="validarUpdateUsuarios()">Actualizar Usuario</button>
    </div>
    <span id="msj"></span>
</form>