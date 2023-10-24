<?php session_start();
    $usuario='';
    $pass='';
    extract($_POST);
    //var_dump($_POST);
    if($usuario == '' || $pass == ''){
        $mensa='Debe completar los campos';
    }else{
        require_once 'controladores/C_Usuarios.php';
        $datos['usuario']=$usuario;
        $datos['pass']=$pass;
        $resultado=$objUsuarios->validarUsuario($datos);

        $resultado=$objUsuarios->validarUsuario(array(
                                                'usuario'=>$usuario,
                                                'pass'=>$pass
                                            ));
        if($resultado=='S'){
            header('Location: index.php');
        }else{
            $mensa='Datos incorrectos';
        }
    }
    
?>