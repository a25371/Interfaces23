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
        $SQL = "SELECT * FROM permisos ORDER BY ID_MENU ASC";
        $PermsData = $this->DAO->consultar($SQL);
        $perms = array();

        foreach ($PermsData as $permData) {
             $id_permiso = $permData['ID_PERMISO'];
             $id_menu = $permData['ID_MENU'];
             $permiso = $permData['PERMISO'];
             $perms[$id_menu][$id_permiso] = "$permiso";
        }
        return $perms;
    }
}
