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
        $PermsData = $this->modelo->getPermisos();
    }
    public function getVistaPerms()
    {
        Vista::render('vistas/Perms/V_Perms.php');
    }
    public function buscarPerms()
    {
        $perms = $this->modelo->buscarPerms();
        Vista::render(
            'vistas/Perms/V_Perms_Listado.php',
            array('perms' => $perms)
        );
    }
    public function getInsertPerms()
    {
        Vista::render('vistas/Perms/V_Perms_Insert.php');
    }
    public function getUpdatePerms()
    {
        Vista::render('vistas/Perms/V_Perms_Update.php');
    }
}
