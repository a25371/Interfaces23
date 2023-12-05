<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Usuarios extends Modelo
{
    public $DAO;

    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }

    public function buscarUsuarios($filtros = array())
    {
        $b_texto = '';
        $b_genero = '';
        $b_activo = '';
        $usuario = '';
        $pass = '';

        extract($filtros);

        $SQL = "SELECT * FROM usuarios WHERE 1=1 ";

        if ($usuario != '' && $pass != '') {
            $usuario = addslashes($usuario);
            $pass = addslashes($pass);
            $SQL .= " AND login = '$usuario' AND pass = MD5('$pass') ";
        }

        if ($b_texto != '') {
            $aTexto = explode(' ', $b_texto);
            $SQL .= " AND (1=2 ";
            foreach ($aTexto as $palabra) {
                $SQL .= " OR apellido_1 LIKE '%$palabra%' ";
                $SQL .= " OR apellido_2 LIKE '%$palabra%' ";
                $SQL .= " OR nombre LIKE '%$palabra%' ";
                $SQL .= " OR login LIKE '%$palabra%' ";
            }
            $SQL .= " ) ";
        }

        if ($b_genero != '') {
            $SQL .= " AND sexo = '$b_genero'";
        }
        if ($b_activo != '') {
            $SQL .= " AND activo = '$b_activo'";
        }
        //echo $SQL.'<br>';
        $usuarios = $this->DAO->consultar($SQL);
        return $usuarios;
    }

    public function insertUsuario($datosU = array())
    {
        $n_texto = '';
        $a1_texto = '';
        $a2_texto = '';
        $ma_texto = '';
        $mo_texto = '';
        $g_texto = '';
        $l_texto = '';
        $p_texto = '';
        $Upass = MD5($p_texto);

        extract($datosU);

        $SQL = "INSERT INTO `usuarios`
            (`nombre`, `apellido_1`, `apellido_2`, `sexo`, `fecha_Alta`, `mail`, `movil`, `login`, `pass`, `activo`)
             VALUES (";
        $SQL .= " '$n_texto', ";
        $SQL .= " '$a1_texto', ";
        $SQL .= " '$a2_texto', ";
        $SQL .= " '$g_texto', ";
        $SQL .= " NOW(), ";
        $SQL .= " '$ma_texto', ";
        $SQL .= " '$mo_texto', ";
        $SQL .= " '$l_texto', ";
        $SQL .= " '$Upass', ";
        $SQL .= " 'Y') ";
        //echo $SQL.'<br>';
        $this->DAO->insertar($SQL);
    }

    public function getUpdateUsuario($ID)
    {
        $SQL = "SELECT * FROM `usuarios` WHERE `id_Usuario` = $ID";
        $datosUser = $this->DAO->consultar($SQL);
        return $datosUser;
    }

    public function updateUsuario($datosU = array())
    {
        $id_Usuario = '';
        $n_texto = '';
        $a1_texto = '';
        $a2_texto = '';
        $g_texto = '';
        $fecha_alta = '';
        $ma_texto = '';
        $mo_texto = '';
        $activo = '';

        extract($datosU);

        $SQL = "UPDATE `usuarios` SET ";
        $SQL .= "`nombre`= '$n_texto'";
        $SQL .= ",`apellido_1`='$a1_texto'";
        $SQL .= ",`apellido_2`='$a2_texto'";
        $SQL .= ",`sexo`='$g_texto'";
        $SQL .= ",`fecha_Alta`='$fecha_alta'";
        $SQL .= ",`mail`='$ma_texto'";
        $SQL .= ",`movil`='$mo_texto'";
        $SQL .= ",`activo`='$activo'";

        $SQL .= "WHERE `id_Usuario`= '$id_Usuario'";
        $SQL .= "";
        $SQL .= "";
        //echo $SQL.'<br>';

        if ($n_texto == '') {
            echo "ERROR-UP001";
        } else {
            //$this->DAO->actualizar($SQL);
        }

        $this->getUpdateUsuario($id_Usuario);
    }
}
