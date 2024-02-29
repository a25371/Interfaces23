<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Perms extends Modelo
{
    public $DAO;
    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }
    public function getPermisos()
    {
        $login = $_SESSION['usuario'];
        //TODO: añadir busqueda de permisos unitarios.
        $SQL = "SELECT PER.id_permiso, PER.id_menu, PER.permiso
        FROM permisos PER
        INNER JOIN permisos_roles PR ON PER.id_permiso = PR.id_permiso
        INNER JOIN roles ROL ON PR.id_rol = ROL.id_rol
        INNER JOIN roles_usuarios ROU ON ROL.id_rol = ROU.id_rol
        INNER JOIN usuarios US ON ROU.id_usuario = US.id_usuario
        WHERE US.login = '$login';";
        //echo $SQL.'<br>';
        $PermsData = $this->DAO->consultar($SQL);
        $perms = array();
        foreach ($PermsData as $permData) {
            $id_permiso = $permData['id_permiso'];
            $id_menu = $permData['id_menu'];
            $permiso = $permData['permiso'];
            $perms[$id_menu][$id_permiso] = "$permiso";
        }
        $_SESSION['perms'] = $perms;
        // $json = json_encode($PermsData);
        // echo 'PERMISOS USUARIO: <br>';
        // echo $json;
    }
    public function buscarPerms()
    {
        $SQL = "SELECT PER.id_permiso, PER.id_menu, PER.permiso, MEN.orden, MEN.id_padre, MEN.titulo
            FROM permisos PER
            INNER JOIN menu MEN ON PER.id_menu = MEN.id_menu
            WHERE 1=1;";
        $PermsData = $this->DAO->consultar($SQL);
        $perms = array();

        foreach ($PermsData as $fila) {
            if ($fila['id_padre'] == 0) {
                $perms[$fila['id_menu']] = $fila;
            } else {
                // Agrupamos hijos con el id_menu
                $id_menu = $fila['id_menu'];
                unset($fila['id_menu']); // Ya no necesitamos id_menu, a si que lo quitamos.
                $perms[$fila['id_padre']]['hijos'][$id_menu][] = $fila;
            }
        }
        return $perms;
    }
    public function updatePerms()
    {
        
    }
}
