<?php
require_once 'modelos/Modelo.php';
require_once 'modelos/DAO.php';
//file_put_contents('array_debug.log', print_r($updateData, true));
//file_put_contents('SQL_Debug.log', $SQL);
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
        $SQL = "SELECT ID_MENU, ID_PADRE, TITULO, ORDEN FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertMenu($insertData = array())
    {
        $MenuID = "";
        $MTitulo = "";
        $MAccion = "";
        $MPrivado = "";
        $MPadre = "";
        $MOrden = "";
        extract($insertData);
        $SQLID = "SELECT MAX(ID_MENU) FROM MENU;";
        $nuevaID = $this->DAO->consultar($SQLID);

        // Obtenemos la ID mas alta y la incrementamos 1
        $maxIDArray = $nuevaID[0];
        $maxID = $maxIDArray['MAX(ID_MENU)'];
        $IDplus = $maxID + 1;

        $orden = $MOrden + 1;
        $SQL = "INSERT INTO menu(ID_MENU, ID_PADRE, ORDEN, TITULO, ACCION, PRIVADO) VALUES ('$IDplus', '$MPadre', '$orden', '$MTitulo', '$MAccion', '$MPrivado');";
        $this->DAO->insertar($SQL);

        // Creamos los roles para el nuevo menu!!!!!!!
        //Usando la ID y el Titulo, creamos 3 roles.
        $SQLPERMS = "INSERT INTO PERMISOS(ID_MENU, PERMISO) VALUES ";
        $SQLPERMS .= "($IDplus, 'Ver $MTitulo'), ";
        $SQLPERMS .= "($IDplus, 'Crear $MTitulo'), ";
        $SQLPERMS .= "($IDplus, 'Borrar $MTitulo');";
        $this->DAO->insertar($SQLPERMS);

        //Le damos los 3 roles a admin (Cambiar luego) ---PREGUNTAR
        $permisos = $this->DAO->consultar("SELECT ID_PERMISO FROM PERMISOS WHERE PERMISO IN ('Ver $MTitulo', 'Crear $MTitulo', 'Borrar $MTitulo');");
        // Insert roles
        $SQLROLES = "INSERT INTO PERMISOS_ROLES(ID_ROL, ID_PERMISO) VALUES ";
        foreach ($permisos as $permiso) {
            $SQLROLES .= "(3, " . $permiso['ID_PERMISO'] . "), ";
        }
        $SQLROLES = rtrim($SQLROLES, ', '); // borramos coma extra
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
        $MenuID = "";
        $MTitulo = "";
        $MAccion = "";
        $MPrivado = "";
        $MOrden = "";
        extract($insertData);
        
        $SQLID = "SELECT MAX(ID_MENU) FROM MENU;";
        $nuevaID = $this->DAO->consultar($SQLID);

        // Obtenemos la ID mas alta y la incrementamos 1
        $maxIDArray = $nuevaID[0];
        $maxID = $maxIDArray['MAX(ID_MENU)'];
        $IDplus = $maxID + 1;

        $orden = $MOrden + 1;
        $SQL = "INSERT INTO menu(ID_MENU, ID_PADRE, ORDEN, TITULO, ACCION, PRIVADO) VALUES ('$IDplus', '$MenuID', '$orden', '$MTitulo', '$MAccion', '$MPrivado');";
        $this->DAO->insertar($SQL);
        // Creamos los roles para el nuevo menu!!!!!!!
        //Usando la ID y el Titulo, creamos 3 roles.
        $SQLPERMS = "INSERT INTO PERMISOS(ID_MENU, PERMISO) VALUES ";
        $SQLPERMS .= "($IDplus, 'Ver $MTitulo'), ";
        $SQLPERMS .= "($IDplus, 'Crear $MTitulo'), ";
        $SQLPERMS .= "($IDplus, 'Borrar $MTitulo');";
        $this->DAO->insertar($SQLPERMS);

        //Le damos los 3 roles a admin (Cambiar luego) ---PREGUNTAR
        $permisos = $this->DAO->consultar("SELECT ID_PERMISO FROM PERMISOS WHERE PERMISO IN ('Ver $MTitulo', 'Crear $MTitulo', 'Borrar $MTitulo');");
        // Insert roles
        $SQLROLES = "INSERT INTO PERMISOS_ROLES(ID_ROL, ID_PERMISO) VALUES ";
        foreach ($permisos as $permiso) {
            $SQLROLES .= "(3, " . $permiso['ID_PERMISO'] . "), ";
        }
        $SQLROLES = rtrim($SQLROLES, ', '); // borramos coma extra
        $this->DAO->insertar($SQLROLES);
    }

    //UPDATE MENU
    public function getUpdateMenu($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT * FROM menu WHERE ID_MENU = $id_menu";
        $GetUpdateData = $this->DAO->consultar($SQL);
        return $GetUpdateData;
    }
    public function updateMenu($updateData = array())
    {
        $MenuID = "";
        $MPadre = "";
        $MOrden = "";
        $MTitulo = "";
        $MAccion = "";
        $MPrivado = "";
        
        extract($updateData);

        $SQL = "UPDATE menu
        SET ID_PADRE = '$MPadre',
        ORDEN = '$MOrden',
        TITULO = '$MTitulo',
        ACCION = '$FP_titulo',
        PRIVADO = '$MPrivado'
        WHERE ID_MENU = '$MenuID';";

        $this->DAO->actualizar($SQL);
        
        //Posible mejora, cambiar el nombre de los permisos
        // if($MTitulo != ""){}

    }

    //DELETE MENU
    public function getDeleteMenu($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT ID_MENU, TITULO FROM menu WHERE ID_MENU = $id_menu";
        $GetDeleteData = $this->DAO->consultar($SQL);
        return $GetDeleteData;
    }
    public function deleteMenu($id_menu)
    {
        extract($id_menu);
        //Borramos las entradas en permisos_roles con la id_menu
        // $SQL = "DELETE FROM permisos_roles
        //         WHERE ID_PERMISO IN (
        //         SELECT ID_PERMISO
        //         FROM PERMISOS
        //         WHERE ID_MENU = '$id_menu') CASCADE CONSTRAINTS;\n";
        // //Borramos los permisos relacionados con el menu
        // $SQL .= "DELETE FROM PERMISOS WHERE ID_MENU = '$id_menu' CASCADE CONSTRAINTS;\n";
        // //Finalmente borramos el menu basado en la ID
        $SQL .= "DELETE FROM MENU WHERE ID_MENU = '$id_menu';";
        file_put_contents('SQL_Debug.log', $SQL);
        $this->DAO->borrar($SQL);
        
    }
}
