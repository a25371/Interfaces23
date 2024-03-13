<?php
$getUpdateData = $datos['getUpdateData'];
print_r($getUpdateData);
?>

<form class="formulario" id="formMenuUpdate" name="formMenuUpdate" onkeydown="return event.key != 'Enter';">
<div class="crear-column">
        <p>Atencion!</p>
        <p>Modificando un menu!</p>
        <input type="hidden" id="MenuID" name="MenuID" value="<?php echo $getUpdateData[0]['ID_MENU']; ?>">
        <input type="hidden" id="MPadre" name="MPadre" value="<?php echo $getUpdateData[0]['ID_PADRE']; ?>">
        <label for="MTitulo">Titulo:</label>
        <input type="text" id="MTitulo" name="MTitulo" value="<?php echo $getUpdateData[0]['TITULO']; ?>">
        <label for="MOrden">Orden:</label>
        <input type="text" id="MOrden" name="MOrden" value="<?php echo $getUpdateData[0]['ORDEN']; ?>">
        <label for="MAccion">Accion:</label>
        <input type="text" id="MAccion" name="MAccion" value="<?php echo $getUpdateData[0]['ACCION']; ?>">
        <label for="MPrivado">Privado:</label>
        <select id="MPrivado" name="MPrivado">
            <option value="0" <?php if ($getUpdateData[0]['PRIVADO'] == '0') echo 'selected="selected"'; ?>>NO</option>
            <option value="1" <?php if ($getUpdateData[0]['PRIVADO'] == '1') echo 'selected="selected"'; ?>>SI</option>
        </select>        
        <button type="button" id="button-crear" onclick="updateMenu()">Modificar Permiso</button>
    </div>
</form> 