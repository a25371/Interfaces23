<?php
$getInsertData = $datos['getInsertData'];

?>

<form class="formulario" id="formPermsInsert" name="formPermsInsert" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Creando un nuevo Submenu! Menu Padre:
            <?php echo $getInsertData[0]['TITULO'] . " con ID: " . $getInsertData[0]['ID_MENU']; ?>
        </p>
        <input type="hidden" id="id_Menu" name="id_Menu" value="<?php echo $getInsertData[0]['ID_MENU']; ?>">
        <label for="MTitulo">Titulo:</label>
        <input type="text" id="MTitulo" name="MTitulo">
        <label for="MAccion">Accion:</label>
        <input type="text" id="MAccion" name="MAccion">
        <label for="MPrivado">Privado:</label>
        <input type="text" id="MPrivado" name="MPrivado">
        <button type="button" id="button-crear" onclick="insertPerms()">Crear Menu</button>
    </div>
</form> 