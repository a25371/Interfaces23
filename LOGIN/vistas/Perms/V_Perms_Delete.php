<?php
$getDeleteData = $datos['getDeleteData'];
// print_r($getDeleteData);
?>


<form class="formulario" id="formPermsInsert" name="formPermsInsert" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <p>Atencion!</p>
        <p>Estas seguro de que quieres eliminar <?php echo $getDeleteData[0]['PERMISO']; ?>?</p>
        <div id="btnRow">
        <button type="button" id="button-Dconfirm" onclick="deletePerms(<?php echo $getDeleteData[0]['ID_PERMISO']; ?>)">Confirmar</button>
        <button type="button" id="button-Dcancel" onclick="cancelDeletePerms()">Cancelar</button>
        </div>
    </div>
</form> 