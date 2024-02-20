<?php
require_once 'controladores/Controlador.php';
require_once 'vistas/Vista.php';
require_once 'modelos/M_Perms.php';
class C_Perms extends Controlador
{
    private $modelo;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = new M_Perms();
    }
    public function getPermisos()
    {
        $PermsData=$this->modelo->getPermisos();
    }
}
