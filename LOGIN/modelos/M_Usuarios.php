<?php
    require_once 'modelos/Modelo.php';
    require_once 'modelos/DAO.php';
    class M_Usuarios extends Modelo{
        public $DAO;

        public function __construct(){
            parent::__construct(); //ejecuta constructor del padre
            $this->DAO = new DAO();
        }

        public function buscarUsuarios($filtros=array()){
            $b_texto='';
            $b_genero='';
            $b_activo='';
            $usuario= '';
            $pass= '';
            
            //$json = json_encode($filtros);
            //echo $json;
            extract($filtros);
            
            
            $SQL="SELECT * FROM usuarios WHERE 1=1 ";

            if ($usuario!='' && $pass!=''){
                $usuario=addslashes($usuario);
                $pass=addslashes($pass);
                $SQL.= " AND login = '$usuario' AND pass = MD5('$pass') ";
            }
            
            if($b_texto!=''){
                $aTexto=explode(' ', $b_texto);
                $SQL.=" AND (1=2 ";
                foreach ($aTexto as $palabra){
                    $SQL.=" OR apellido_1 LIKE '%$palabra%' ";
                    $SQL.=" OR apellido_2 LIKE '%$palabra%' ";
                    $SQL.=" OR nombre LIKE '%$palabra%' ";
                    $SQL.=" OR login LIKE '%$palabra%' ";
                }
                $SQL.=" ) ";
                //$SQL.=" AND apellido_1='".$b_texto."' ";
            }
            if($b_genero!=''){
                $SQL .= " AND sexo = '$b_genero'";
            }
            if($b_activo!=''){
                $SQL .= " AND activo = '$b_activo'";
            }
            //echo $SQL.'<br>';
            $usuarios=$this->DAO->consultar($SQL);
            return $usuarios;
        }

        public function crearUsuario($datosU=array()){
            $n_texto='';
            $a1_texto='';
            $a2_texto='';
            $ma_texto='';
            $mo_texto='';
            $g_texto='';
            $l_texto='';
            $p_texto='';

            $Upass = MD5($p_texto);
            
            //$json = json_encode($filtros);
            //echo $json;
            extract($datosU);

            $SQL= "INSERT INTO `usuarios`
            (`nombre`, `apellido_1`, `apellido_2`, `sexo`, `fecha_Alta`, `mail`, `movil`, `login`, `pass`, `activo`)
             VALUES (";
             $SQL.=" '$n_texto', ";
             $SQL.=" '$a1_texto', ";
             $SQL.=" '$a2_texto', ";
             $SQL.=" '$g_texto', ";
             $SQL.=" NOW(), ";
             $SQL.=" '$ma_texto', ";
             $SQL.=" '$mo_texto', ";
             $SQL.=" '$l_texto', ";
             $SQL.=" '$Upass', ";
             $SQL.=" 'Y') ";
            //echo $SQL.'<br>';

            $this->DAO->insertar($SQL);
        }

        public function editarUsuario($datosU=array()){
            
        }
    }
?>