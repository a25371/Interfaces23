<?php
require_once 'controladores/Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Menus.php';
class C_Menus extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Menus();
    }
    public function getMenu()
    {
        Vista::render('vistas/Menus/V_Menus.php');
    }
    public function getMenuBD()
    {
        $MenuData=$this->modelo->getMenuData();
        //echo json_encode($MenuData);
        Vista::render('vistas/Menus/V_MenusBD.php',
                       array('MenuData'=>$MenuData));
    }

    //INSERT MENU
    public function getInsertMenu($getInsertData = array())
    {
        $getInsertData = $this->modelo->getInsertMenu($getInsertData);
        Vista::render(
            'vistas/Menus/V_Menus_Insert.php',
            array('getInsertData' => $getInsertData)
        );
    }
    public function insertMenu($insertData = array())
    {
        $insertData = $this->modelo->insertMenu($insertData);
        Vista::render(
            'vistas/Menus/V_Menus_Insert.php',
            array('insertData' => $insertData)
        );
    }

    //INSERT SUBMENU
    public function getInsertSubMenu($getInsertData = array())
    {
        $getInsertData = $this->modelo->getInsertSubMenu($getInsertData);
        Vista::render(
            'vistas/Menus/V_Menus_InsertSub.php',
            array('getInsertData' => $getInsertData)
        );
    }
    public function insertSubMenu($insertData = array())
    {
        $insertData = $this->modelo->insertSubMenu($insertData);
        Vista::render(
            'vistas/Menus/V_Menus_InsertSub.php',
            array('insertData' => $insertData)
        );
    }

    //UPDATE MENU
    public function getUpdateMenu($getUpdateData = array())
    {
        $getUpdateData = $this->modelo->getUpdateMenu($getUpdateData);
        Vista::render(
            'vistas/Menus/V_Menus_Update.php',
            array('getUpdateData' => $getUpdateData)
        );
    }
    public function updateMenu($updateData = array())
    {
        $updateData = $this->modelo->updateMenu($updateData);
        Vista::render(
            'vistas/Menus/V_Menus_Update.php',
            array('updateData' => $updateData)
        );
    }

    //DELETE MENU
    public function getDeleteMenu($getDeleteData = array())
    {
        $getDeleteData = $this->modelo->getDeleteMenu($getDeleteData);
        Vista::render(
            'vistas/Menus/V_Menus_Delete.php',
            array('getDeleteData' => $getDeleteData)
        );
    }
    public function deleteMenu($id_menu)
    {
        $id_menu = $this->modelo->deleteMenu($id_menu);
        Vista::render(
            'vistas/Menus/V_Menus_Delete.php');
    }
}
