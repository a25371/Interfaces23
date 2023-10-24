<?php session_start();
    $usuario='';
    $pass='';
    $respuesta['valido']='NO';
    $respuesta['msj']='NO verificado';
    $respuesta['usuario']='';
    unset($_SESSION['usuario']);

    // $respuesta=array('valido' =>'NO', 'msj' => 'NO verificado', 'usuario'=> '');  Otro metodo para hacer un array
    if(isset($_GET)){
        extract($_GET);
        if($usuario=='' || $pass==''){
            $respuesta['msj']='Datos incorrectos. ERR-LG-01';
        }else{
            if($usuario=='Fran' && $pass=='123'){
                $respuesta['valido']='SI';
                $respuesta['msj']='';
                $respuesta['usuario']=$usuario;
                $_SESSION['usuario']= $usuario;
            }else{
                $respuesta['msj']='Datos incorrectos. ERR-LG-02. usuario='.$usuario.' Pass='.$pass;
            }
        }
    }else{
        $respuesta['msj']='Datos no recividos';
    }

    echo json_encode($respuesta);
?>