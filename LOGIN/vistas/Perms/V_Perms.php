<?php
?>
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <div class="buscar-column">
        <label for="b_texto">Busqueda de Permisos:</label>
        <button type="button" onclick="buscarPerms()">Buscar</button>
    </div>
    <div class="buscar-column">
        <label for="PUser">Usuario:</label>
        <input type="text" id="PUser" name="PUser">
    </div>
    <div class="buscar-column">
        <label for="PRol">Rol:</label>
        <input type="text" id="PRol" name="PRol">
    </div>
</form>
<div id="capaResultadosBusqueda"></div>