<?php
$getDeleteData = $datos['getDeleteData'];
// print_r($getDeleteData);
?>


<form class="formulario" id="formMenuDelete" name="formMenuDelete" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Estas seguro de que quieres eliminar <?php echo $getDeleteData[0]['TITULO']; ?>?</p>
        <div id="btnRow">
        <button type="button" id="button-Dconfirm" onclick="deleteMenu(<?php echo $getDeleteData[0]['ID_MENU']; ?>)">Confirmar</button>
        <button type="button" id="button-Dcancel" onclick="cancelDeletePerms()">Cancelar</button>
        </div>
    </div>
</form> 