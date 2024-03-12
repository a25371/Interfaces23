<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
class M_Menus extends Modelo
{
    public $DAO;
    public function __construct()
    {
        parent::__construct(); //ejecuta constructor del padre
        $this->DAO = new DAO();
    }
    public function getMenuData()
    {
        $SQL = "SELECT * FROM menu WHERE 1=1";
        //echo $SQL.'<br>';
        $MenuData = $this->DAO->consultar($SQL);
        $menu = array();
        foreach ($MenuData as $fila) {
            if ($fila['ID_PADRE'] == 0) {
                $menu[$fila['ID_MENU']] = $fila;
            } else {
                $menu[$fila['ID_PADRE']]['hijos'][$fila['ORDEN']] = $fila;
            }
        }
        return $menu;
    }

    // INSERT MENU
    public function getInsertMenu($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT ID_MENU, TITULO, ORDEN FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertMenu($insertData = array())
    {
        $MenuID = "";
        $MTitulo = "";
        $MAccion = "";
        $MPrivado = "";
        $MOrden = "";
        extract($insertData);
        $nuevaID = $this->DAO->consultar("SELECT MAX(ID_MENU) + 1 AS Next_ID_Menu FROM MENU;");
        $orden = $MOrden + 1;

        
        $SQL = "INSERT INTO menu(ID_MENU, ID_PADRE, ORDEN, TITULO, ACCION, PRIVADO) VALUES ('999','0','$orden','$MTitulo','$MAccion','$MPrivado');";
        $this->DAO->insertar($SQL);
        echo $SQL;
        // Creamos los roles para el nuevo menu!!!!!!!

        // Cojemos la id del menu que acabamos de crear
        $IDMENU = $this->DAO->consultar("SELECT LAST_INSERT_ID() AS ID_MENU;");

        //Usando la ID y el Titulo, creamos 3 roles.
        $SQLPERMS = "INSERT INTO PERMISOS(ID_MENU, PERMISO) VALUES ";
        $SQLPERMS .= "($IDMENU, 'Ver $MTitulo'), ";
        $SQLPERMS .= "($IDMENU, 'Crear $MTitulo'), ";
        $SQLPERMS .= "($IDMENU, 'Borrar $MTitulo');";
        $this->DAO->insertar($SQLPERMS);
        //Le damos los 3 roles a admin (Cambiar luego) ---PREGUNTAR
        $permisos = $this->DAO->consultar("SELECT ID_PERMISO FROM PERMISOS WHERE PERMISO IN ('Ver $MTitulo', 'Crear $MTitulo', 'Borrar $MTitulo');");

        // Insert roles for permissions in batch
        $SQLROLES = "INSERT INTO PERMISOS_ROLES(ID_ROL, ID_PERMISO) VALUES ";
        foreach ($permisos as $permiso) {
            $SQLROLES .= "(3, $permiso), ";
        }
        $SQLROLES = rtrim($SQLROLES, ', '); // Remove trailing comma
        $this->DAO->insertar($SQLROLES);
    }

    // INSERT SUBMENU
    public function getInsertSubMenu($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT ID_MENU, ID_PADRE, TITULO, ORDEN FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertSubMenu($insertData = array())
    {

    }

    //UPDATE MENU
    public function getUpdateMenu()
    {
    }
    public function updateMenu()
    {
    }

    //DELETE MENU
    public function getDeleteMenu()
    {
    }
    public function deleteMenu()
    {
    }
}
