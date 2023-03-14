<?php
require_once('Config/GenerarCfg.php');

class EstandarCtrll extends GenerarCfg
{
    // public function Principal() {
    //     $ObjListar = $this -> LoadModel("ModelMd");
    //     $Data['Data'] = $ObjListar -> Listar();
    //     $this -> LoadView("Principal/".$_GET['Pg'].".php", $_GET['Pg'], $Data);
    // }

    public function Principal()
    {
        $ObjListar = $this->LoadModel("ModelMd");
        $Data['Data'] = $ObjListar->Listar();
        // $this->LoadView("Principal/" . $_GET['Pg'] . ".php", $_GET['Pg'], $Data);
        require_once('Views/Principal/' . $_GET['Pg'].'.php');
    }

    public function NewData()
    {
        $ObjListar = $this->LoadModel("ModelMd");
        echo $ObjListar->Insertar();
    }

    public function DeleteData()
    {
        $ObjListar = $this->LoadModel("ModelMd");
        echo $ObjListar->DeleteRow();
    }
}
?>