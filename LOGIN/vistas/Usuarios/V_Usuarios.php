<?php
    echo 'Busqueda de usuarios: ';
    

?>
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
<label for="b_texto">
    <input type="text" id="b_texto" name="b_texto">
</label>
<button type="button" onclick="buscarUsuarios()">Buscar</button>
</form>
<div id="capaResultadosBusqueda">
    
</div>