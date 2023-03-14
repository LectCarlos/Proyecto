<?php
class ConxecionCfg {
    protected $Cnx;

    public function Conectar() {
        $this -> Cnx = new mysqli('localhost', 'root', '', 'databaseprueba');
        return $this -> Cnx;
    }

    public function Data($SQL)
    {
        $Conn = $this->Conectar();
        $Rta = mysqli_query($Conn, $SQL);
        $Array = array();

        if ($Rta) {
            $NumRows = mysqli_num_rows($Rta);

            for ($I = 0; $I < $NumRows; $I++) {
                $Array[] = mysqli_fetch_array($Rta);
            }
        }

        return $Array;
    }

    public function Insert($Table, $Data)
    {
        $Row = array_keys($Data);
        $SQL = "INSERT INTO " . $Table . "(";
        for ($I = 0; $I < count($Row); $I++) {
            $SQL .= $Row[$I];
            
            if (($I+1) != count($Row)) {
                $SQL .= ',';
            }
        }
        $SQL .= ")";

        $SQL .= "VALUES(";
        for ($I = 0; $I < count($Data); $I++) {
            $SQL .= "'" . str_replace("'", "&#39;", $Data[$Row[$I]]);

            if (($I+1) != count($Row)) {
                $SQL .= "',";
            } else {
                $SQL .= "'";
            }
        }
        $SQL .= ")";

        $Conn = $this->Conectar();
        $Rta = mysqli_query($Conn, $SQL);

        if ($Rta) {
            return mysqli_insert_id($Conn);
        }

        return false;
    }

    public function Delete($Table, $Filtro)
    {
        $SQL = "DELETE FROM ".$Table." WHERE ".$Filtro;
        
        $Conn = $this->Conectar();
        $Rta = mysqli_query($Conn, $SQL);

        if ($Rta) {
            return true;
        }

        return false;
    }
}
?>