<?php
echo 'Busqueda de usuarios: ';
?>
<form id="formularioBuscar" name="formularioBuscar" onkeydown="return event.key != 'Enter';">
    <label for="b_texto">
        <input type="text" id="b_texto" name="b_texto">
    </label>
    <div class="buscar-column">
        <label for="b_genero">Género:</label>
        <select id="b_genero" name="b_genero">
            <option value="">None</option>
            <option value="H">H</option>
            <option value="M">M</option>
        </select>
    </div>
    <div class="buscar-column">
        <label for="b_activo">Activo:</label>
        <select id="b_activo" name="b_activo">
            <option value="">None</option>
            <option value="S">S</option>
            <option value="N">N</option>
        </select>
    </div>
    <div class="buscar-column">
        <button type="button" onclick="buscarUsuarios()">Buscar</button>
    </div>
    <div class="buscar-column">
        <button type="button" onclick="getInsertUsuario()">Nuevo Usuario</button>
    </div>
</form>
<div id="capaEditarUsuario"></div>
<div id="capaResultadosBusqueda"></div>