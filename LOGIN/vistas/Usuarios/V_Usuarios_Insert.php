<?php

?>
<hr>
<form class="formulario" id="formularioCrear" name="formularioCrear" onkeydown="return event.key != 'Enter';">
    <div class="crear-column">
        <label for="n_texto">Nombre:</label>
        <input type="text" id="n_texto" name="n_texto">
        <label for="a1_texto">Apellido 1:</label>
        <input type="text" id="a1_texto" name="a1_texto">
        <label for="a2_texto">Apellido 2:</label>
        <input type="text" id="a2_texto" name="a2_texto">
    </div>
    <div class="crear-column">
        <label for="ma_texto">Email:</label>
        <input type="text" id="ma_texto" name="ma_texto">
        <label for="mo_texto">Movil:</label>
        <input type="text" id="mo_texto" name="mo_texto">
        <label for="g_texto">Género:</label>
        <select id="g_texto" name="g_texto">
            <option value="">None</option>
            <option value="H">H</option>
            <option value="M">M</option>
        </select>
    </div>
    <div class="crear-column">
        <label for="l_texto">Login:</label>
        <input type="text" id="l_texto" name="l_texto">
        <label for="p_texto">Password:</label>
        <input type="text" id="p_texto" name="p_texto">
        <button type="button" id="button-crear" onclick="validarInsertUsuarios()">Crear Usuario</button>
    </div>
    <span id="msj"></span>
</form>