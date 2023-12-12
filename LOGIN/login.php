<?php session_start();
$usuario = '';
$pass = '';
extract($_POST);
//var_dump($_POST);
if ($usuario == '' || $pass == '') {
    $mensa = '';
} else {
    require_once 'controladores/C_Usuarios.php';
    $objUsuarios = new C_Usuarios();
    $datos['usuario'] = $usuario;
    $datos['pass'] = $pass;
    //$resultado=$objUsuarios->validarUsuario($datos);

    $resultado = $objUsuarios->validarUsuario(array(
        'usuario' => $usuario,
        'pass' => $pass
    ));
    if ($resultado == 'S') {
        header('Location: index.php');
    } else {
        $mensa = 'Datos incorrectos';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script type="text/javascript">
        function validar() {
            const usuario = document.getElementById("usuario");
            const pass = document.getElementById("pass");
            let mensaje = '';
            if (usuario.value == '' || pass.value == '') {
                mensaje = 'Debes completar los campos.';
            } else {
                // Enviar formulario
                document.getElementById("formularioLogin").submit();
            }
            document.getElementById("msj").innerHTML = mensaje;
        }
    </script>
</head>
<body>
    <div class="form-container">
        <form form id="formularioLogin" method="post" action="login.php">
            <div class="inputs">
                <div class="input-column">
                    <div class="input-row">
                        <label for="usuario">User:</label>
                        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>">
                    </div>
                    <div class="input-row">
                        <label for="pass">Pass:</label>
                        <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>">
                    </div>
                </div>
            </div>
            <div class="button-div">
                <input type="button" value="Enviar" onclick="validar()">
            </div>
            <div class="div-msj">
                <span id="msj"><?php echo $mensa; ?></span>
            </div>
    </div>
    </form>
</body>
</html>