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
}
