<?php
$getInsertData = $datos['getInsertData'];
?>

<form class="formulario" id="formPermsInsert" name="formPermsInsert" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Creando nuevo permiso para: <?php echo $getInsertData[0]['TITULO'] . " con ID: " . $getInsertData[0]['ID_MENU']; ?></p>
        <input type="hidden" id="id_Menu" name="id_Menu" value="<?php echo $getInsertData[0]['ID_MENU']; ?>">
        <label for="FP_titulo">Titulo:</label>
        <input type="text" id="FP_titulo" name="FP_titulo">
        <button type="button" id="button-crear" onclick="insertPerms()">Crear Permiso</button>
    </div>
    <span id="msj"></span>
</form>