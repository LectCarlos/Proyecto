<?php
class GenerarCfg {
    public function LoadModel($NameModel) {
        require_once('Models/'.$NameModel.'.php');
        return new $NameModel;
    }

    public function LoadView($Vista, $Title, $Param = array()) {
        foreach (array_keys($Param) as $Key) {
            $$Key = $Param[$Key];
        }
        require_once('Views/Base.php');
    }
}
?>