<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login2</title>
    <script type="text/javascript">
        function validar() {
            const usuario = document.getElementById("usuario");
            const pass = document.getElementById("pass");
            let mensaje = '';
            if (usuario.value == '' || pass.value == '') {
                mensaje = 'Debes completar los campos.';
            } else {
                //LLAMADA AJAX
                let opciones={method: "GET"};
                let parametros= "usuario="+usuario+"&pass="+pass;
                fetch("validarUsuario.php?"+parametros, opciones)
                    .then(res =>{
                        if(res.ok){
                        console.log('Respuesta ok');
                        return res.json();
                        }
                    })
                    .then(respuestaJson=>{
                            console.log(respuestaJson);
                            if(respuestaJson.valido =='SI'){
                                location.href = "index.php";
                            }else{
                                document.getElementById("msj").innerHTML=respuestaJson.msj;
                            }
                    })
                    .catch(err=>{
                        console.log("Error al realizar la peticion.", err.message);
                    });

            }
            document.getElementById("msj").innerHTML=mensaje;
        }
    </script>
</head>

<body>
    <form id="formularioLogin" method="post" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario">  <br>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass">
        <span id="msj"></span>
        <input type="button" value="Enviar" onclick="validar()">
    </form>
</body>