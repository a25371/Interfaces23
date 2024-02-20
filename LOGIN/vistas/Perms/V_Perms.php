<?php
echo 'Busqueda de Permisos: ';
?>
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <!-- 
    <label for="b_texto">
        <input type="text" id="b_texto" name="b_texto">
    </label>
    -->
    <div class="buscar-column">
        <button type="button" onclick="buscarPerms()">Buscar</button>
    </div>
</form>
<div id="capaResultadosBusqueda"></div>