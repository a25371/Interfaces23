<?php
$getInsertData = $datos['getInsertData'];

?>

<form class="formulario" id="formMenuInsert" name="formMenuInsert" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Creando un nuevo menu!</p>
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
        <button type="button" id="button-crear" onclick="insertMenu()">Crear Menu</button>
    </div>
</form> 