<?php session_start();
    $usuario='';
    $pass='';
    extract($_POST); //Lee lo que recibe y asigna los valores a los que tengamos creados, si recive un valor no creado, lo crea, si creamos un valor pero no lo recibe, lo deja como esta definido.

    if($usuario == '' || $pass == ''){
        $mensa='Debe completar los campos';
    }else{
        if($usuario == 'Fran' && $pass=='123'){
            $_SESSION['usuario']=$usuario;
            header('Location: index.php'); //Redirige a index.php
        }else{
            $mensa='Datos incorrectos';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            document.getElementById("msj").innerHTML=mensaje;
        }
    </script>
</head>

<body>
    <form id="formularioLogin" method="post" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" value="<?php echo $usuario; ?>">  <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>">
        <span id="msj"><?php echo $mensa; ?></span>
        <input type="button" value="Enviar" onclick="validar()">
    </form>
</body>

</html>