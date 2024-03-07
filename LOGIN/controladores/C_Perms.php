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

    //INSERT PERMS
    public function getInsertPerms($getInsertData = array())
    {
        $getInsertData = $this->modelo->getInsertPerms($getInsertData);
        Vista::render(
            'vistas/Perms/V_Perms_Insert.php',
            array('getInsertData' => $getInsertData)
        );
    }
    public function insertPerms($insertData = array())
    {
        $insertData = $this->modelo->insertPerms($insertData);
        Vista::render(
            'vistas/Perms/V_Perms_Insert.php',
            array('insertData' => $insertData)
        );
    }

    //UPDATE PERMS
    public function getUpdatePerms($getUpdateData = array())
    {
        $getUpdateData = $this->modelo->getUpdatePerms($getUpdateData);
        Vista::render(
            'vistas/Perms/V_Perms_Update.php',
            array('getUpdateData' => $getUpdateData)
        );
    }
    public function updatePerms($updateData = array())
    {
        $updateData = $this->modelo->updatePerms($updateData);
        Vista::render(
            'vistas/Perms/V_Perms_Update.php',
            array('updateData' => $updateData)
        );
    }

    // DELETE PERMS
    public function getDeletePerms($getDeleteData = array())
    {
        $getDeleteData = $this->modelo->getDeletePerms($getDeleteData);
        Vista::render(
            'vistas/Perms/V_Perms_Delete.php',
            array('getDeleteData' => $getDeleteData)
        );
    }
    public function deletePerms($id_permiso)
    {
        $id_permiso = $this->modelo->deletePerms($id_permiso);
        Vista::render(
            'vistas/Perms/V_Perms_Delete.php');
    }
}
