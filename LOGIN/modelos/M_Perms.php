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
        //HECHO: añadir busqueda de permisos unitarios.
        $SQL = "(SELECT PER.id_permiso, PER.id_menu, PER.permiso
        FROM permisos PER
        INNER JOIN permisos_roles PR ON PER.id_permiso = PR.id_permiso
        INNER JOIN roles ROL ON PR.id_rol = ROL.id_rol
        INNER JOIN roles_usuarios ROU ON ROL.id_rol = ROU.id_rol
        INNER JOIN usuarios US ON ROU.id_usuario = US.id_usuario
        WHERE US.login = '$login')
        
        UNION

        (SELECT PER.id_permiso, PER.id_menu, PER.permiso
        FROM permisos PER
        INNER JOIN permisos_usuarios PU ON PER.id_permiso = PU.id_permiso
        INNER JOIN usuarios US ON PU.id_usuario = US.id_usuario
        WHERE US.login = '$login')";
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
    public function buscarPerms($filtros=array())
    {
        $PUser = "";
        $PRol = "";

        extract($filtros);

        $permsMod = array();

        if(strlen(trim($PRol)) > 0){            //ROLES
            $SQLMod = "SELECT PER.id_permiso
            FROM permisos PER
            INNER JOIN permisos_roles PR ON PER.id_permiso = PR.id_permiso
            INNER JOIN roles RO ON PR.ID_ROL = RO.ID_ROL
            WHERE RO.ROL = '$PRol';";
            $permsMod = $this->DAO->consultar($SQLMod);
        }else if(strlen(trim($PUser)) > 0){     //USUARIOS
            $SQLMod = "SELECT PER.id_permiso
            FROM permisos PER
            INNER JOIN permisos_usuarios PU ON PER.id_permiso = PU.id_permiso
            INNER JOIN usuarios US ON PU.id_usuario = US.id_usuario
            WHERE US.login = '$PUser';";
            $permsMod = $this->DAO->consultar($SQLMod);
        }
        $SQL = "SELECT PER.id_permiso, PER.id_menu, PER.permiso, MEN.orden, MEN.id_padre, MEN.titulo
            FROM permisos PER
            INNER JOIN menu MEN ON PER.id_menu = MEN.id_menu
            WHERE 1=1;";
        $PermsData = $this->DAO->consultar($SQL);
        $perms = array();

        foreach ($PermsData as $fila) {
            if ($fila['id_padre'] == 0) {
                // If the key already exists, append the new data to the existing array
                if (!isset($perms[$fila['id_menu']])) {
                    $perms[$fila['id_menu']] = array();
                }
                $perms[$fila['id_menu']][] = $fila;
            } else {
                // Agrupamos hijos con el id_menu
                $id_menu = $fila['id_menu'];
                unset($fila['id_menu']); // Ya no necesitamos id_menu, a si que lo quitamos.
                if (!isset($perms[$fila['id_padre']]['hijos'][$id_menu])) {
                    $perms[$fila['id_padre']]['hijos'][$id_menu][] = $fila;
                } else {
                    // If the key already exists, append the new data to the existing array
                    $perms[$fila['id_padre']]['hijos'][$id_menu][] = $fila;
                }
            }
        }

        //$json = json_encode($perms);
        //echo $json;
        return array(
            'perms' => $perms,
            'PUser' => $PUser,
            'PRol' => $PRol,
            'permsMod' => $permsMod
        );
    }

    public function getPerms4Mod(){
        $SQL = "SELECT * FROM PERMISOS WHERE 1=1";
        $allPerms = $this->DAO->consultar($SQL);
        return $allPerms;
    }
    public function getInsertPerms($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT ID_MENU, TITULO FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertPerms($insertData = array())
    {
        $id_Menu = "";
        $FP_titulo = "";

        extract($insertData);
        $SQL = "INSERT INTO permisos(ID_MENU, PERMISO) VALUES ($id_Menu , '$FP_titulo');";
        echo "<script>console.log('$SQL');</script>";
        $this->DAO->insertar($SQL);
    }
    public function getDeletePerms($id_permiso)
    {
        extract($id_permiso);
        $SQL = "SELECT ID_PERMISO, PERMISO FROM permisos WHERE ID_Permiso = $id_permiso";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function deletePerms($id_permiso)
    {
        extract($id_permiso);
        $SQL = "DELETE FROM permisos WHERE ID_Permiso = $id_permiso";
        $this->DAO->borrar($SQL);
    }
    public function getUpdatePerms($id_permiso)
    {
        extract($id_permiso);
        $SQL = "SELECT PER.id_permiso, PER.permiso, MEN.titulo
        FROM permisos PER
        INNER JOIN menu MEN ON PER.id_menu = MEN.id_menu
        WHERE PER.id_permiso = $id_permiso;";
        $getUpdateData = $this->DAO->consultar($SQL);
        return $getUpdateData;
    }
    public function updatePerms($updateData = array()){

        $id_permiso = "";
        $FP_titulo = "";

        extract($updateData);
        $SQL = "UPDATE permisos
        SET permiso = '$FP_titulo'
        WHERE id_permiso = $id_permiso;";
        $this->DAO->actualizar($SQL);
        echo "<script>console.log('$SQL');</script>";
    }

    public function updatePermsPUser($modData)
    {
        $id_permiso = "";
        $id_user = "";
        $Pstatus = "";

        extract($modData);
        if($Pstatus === "0"){
            $SQL = "DELETE FROM permisos_usuarios
                    WHERE ID_PERMISO = '$id_permiso'
                    AND ID_usuario = (
                    SELECT ID_usuario 
                    FROM usuarios 
                    WHERE login = '$id_user');";
            $this->DAO->borrar($SQL);
        }else{
            $SQL = "INSERT INTO permisos_usuarios (ID_PERMISO, ID_USUARIO) 
                    SELECT '$id_permiso', ID_USUARIO 
                    FROM usuarios
                    WHERE login = '$id_user';";
            $this->DAO->insertar($SQL);
        }
    }
    public function updatePermsPRol($modData)
    {
        $id_permiso = "";
        $id_rol = "";
        $Pstatus = "";
        extract($modData);

        if($Pstatus === "0"){
            $SQL = "DELETE FROM permisos_roles
                    WHERE ID_PERMISO = '$id_permiso'
                    AND ID_ROL = (
                    SELECT ID_ROL 
                    FROM roles 
                    WHERE rol = '$id_rol');";
            $this->DAO->borrar($SQL);
        }else{
            $SQL = "INSERT INTO permisos_roles (ID_PERMISO, ID_ROL) 
                    SELECT '$id_permiso', ID_ROL 
                    FROM roles 
                    WHERE roles = '$id_rol';";
            $this->DAO->insertar($SQL);
        }
    }
}
