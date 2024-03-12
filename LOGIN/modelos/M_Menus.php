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
        foreach($MenuData as $fila){
            if($fila['ID_PADRE'] == 0){
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
        $SQL = "SELECT ID_MENU, ID_PADRE, TITULO FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertMenu(){}

    // INSERT SUBMENU
    public function getInsertSubMenu($id_menu)
    {
        extract($id_menu);
        $SQL = "SELECT ID_MENU, ID_PADRE, TITULO FROM menu WHERE ID_MENU = $id_menu";
        $GetInsertData = $this->DAO->consultar($SQL);
        return $GetInsertData;
    }
    public function insertSubMenu(){}

    //UPDATE MENU
    public function getUpdateMenu(){}
    public function updateMenu(){}

    //DELETE MENU
    public function getDeleteMenu(){}
    public function deleteMenu(){}
}
