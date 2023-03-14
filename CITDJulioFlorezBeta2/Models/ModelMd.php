<?php
require_once('Config/ConexionCfg.php');

class ModelMd extends ConxecionCfg {
    public function Listar() {
        return $this -> Data('SELECT * FROM Usuarios');
    }

    public function Insertar() {
        $Data['Nombre_User'] = $_POST['Nombre_User'];
        $Data['Apellido_User'] = $_POST['Apellido_User'];
        return $this -> Insert('Usuarios', $Data);
    }

    public function DeleteRow() {
        return $this -> Delete('Usuarios', 'PK_Id_User='.$_POST['Delete']);
    }
}
?>