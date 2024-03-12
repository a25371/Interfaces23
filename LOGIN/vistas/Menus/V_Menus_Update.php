<?php
$getUpdateData = $datos['getUpdateData'];

?>

<form class="formulario" id="formPermsUpdate" name="formPermsUpdate" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Modificando el permiso:
            <?php echo $getUpdateData[0]['permiso']; ?>
        </p>
        <input type="hidden" id="id_permiso" name="id_permiso" value="<?php echo $getUpdateData[0]['id_permiso']; ?>">
        <label for="FP_titulo">Nombre del permiso:</label>
        <input type="text" id="FP_titulo" name="FP_titulo" value="<?php echo $getUpdateData[0]['permiso']; ?>">
        <label for="FP_idmenu">Menu asociado:</label>
        <input type="text" id="FP_idmenu" name="FP_idmenu" value="<?php echo $getUpdateData[0]['titulo']; ?>">        
        <button type="button" id="button-crear" onclick="updatePerms()">Modificar Permiso</button>
    </div>
</form> 