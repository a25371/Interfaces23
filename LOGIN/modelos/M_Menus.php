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
    public function insertMenu(){
        
    }
}
