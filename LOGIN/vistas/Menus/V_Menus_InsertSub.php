<?php
$getInsertData = $datos['getInsertData'];
//print_r($getInsertData);
?>

<form class="formulario" id="formSubMenuInsert" name="formSubMenuInsert" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Creando un nuevo Submenu para <?php echo $getInsertData[0]['TITULO']; ?>!</p>
        <input type="hidden" id="MenuID" name="MenuID" value="<?php echo $getInsertData[0]['ID_MENU']; ?>">
        <input type="hidden" id="MOrden" name="MOrden" value="<?php echo $getInsertData[0]['ORDEN']; ?>">
        <label for="MTitulo">Titulo:</label>
        <input type="text" id="MTitulo" name="MTitulo">
        <label for="MAccion">Accion:</label>
        <input type="text" id="MAccion" name="MAccion">
        <label for="MPrivado">Privado:</label>
        <select id="MPrivado" name="MPrivado">
            <option value="1">SI</option>
            <option value="0">NO</option>
        </select>
        <button type="button" id="button-crear" onclick="insertSubMenu()">Crear SubMenu</button>
    </div>
</form> 