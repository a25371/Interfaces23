<?php
    require_once 'controladores/Controlador.php';
    require_once 'vistas/Vista.php';
    require_once 'modelos/M_Usuarios.php';

    class C_Usuarios extends Controlador{
        private $modelo;
        public function __construct(){
            parent::__construct();
            $this->modelo = new M_Usuarios();
        }

        public function validarUsuario(){
            $usuario='';
            $pass='srfdvsvwrt';
            extract($datos);
            $valido='N';
            if($usuario=='fran' && $pass== '123'){
                $_SESSION['usuario']=$usuario;
                $valido='S';
            }
            echo $valido;
        }

        public function getVistaUsuarios(){
            Vista::render('vistas/Usuarios/V_Usuarios.php');
        }
        public function buscarUsuarios(){
            $usuarios=$this->modelo->buscarUsuarios();
            //echo json_encode($usuarios);
            Vista::render('vistas/Usuarios/V_Usuarios_Listado.php', 
                            array('usuarios'=>$usuarios));
        }
    }
?>