<?php
$Servidor = new mysqli("localhost", "root", "", "CITDJulioFlorez");

$Consulta = "SELECT * FROM Usuarios ORDER BY CorreoPer_User ASC LIMIT 20";

$Conexion = mysqli_query($Servidor, $Consulta);

mysqli_close($Servidor);

$Busqueda = $_POST['Busqueda'];
$BusquedaMin = strtolower($Busqueda);

$Array = array();
$OtherArray = array();
$Other = array(
    "@Todos", "@Administradores", "@Biblioteca", "@Comedor",
    "@Orientación", "@Profesores", "@Estudiantes", "@Once", "@Décimo",
    "@Noveno", "@Octavo", "@Septimo", "@Sexto", "@1104", "@1103", "@1102",
    "@1101", "@1004", "@1003", "@1002", "@1001", "@904", "@903", "@902",
    "@901", "@803", "@802", "@801", "@703", "@702", "@701", "@603",
    "@602", "@601"
);

if (mysqli_num_rows($Conexion) > 0) {
    if ($BusquedaMin == '') {
        $Num = 0;

        while ($Row = mysqli_fetch_assoc($Conexion)) {
            $Array[] = $Row["CorreoPer_User"];
            $Num++;

            if ($Num == 20) {
                break;
            }
        }

        if (count($Other) > 0) {
            $OtherNum = 0;

            foreach ($Other as $OtherElement) {
                if ($OtherNum <= 19) {
                    $OtherArray[] = $OtherElement;
                    $OtherNum++;
                } else {
                    break;
                }
            }
        }
    } else {
        $Num = 0;

        while ($Row = mysqli_fetch_assoc($Conexion)) {
            $RowMin = strtolower($Row["CorreoPer_User"]);
            similar_text($BusquedaMin, $RowMin, $Porcentaje);

            if (strpos($RowMin, $BusquedaMin) !== false) {
                $Array[] = $Row["CorreoPer_User"];
            }
        }

        if (count($Other) > 0) {
            foreach ($Other as $OtherElement) {
                $OtherMin = strtolower($OtherElement);
                similar_text($BusquedaMin, $OtherMin, $Porcentaje);
    
                if (strpos($OtherMin, $BusquedaMin) !== false) {
                    $OtherArray[] = $OtherElement;
                }
            }
        }
    }
}

$AllArray = array_merge($Array, $OtherArray);

if (count($AllArray) > 0) {
    $Limit = 0;

    foreach ($AllArray as $Elemento) {
        if ($Limit <= 19) {
            $Limit++;
            echo '<li class="Item Text" data-element="Item-Tag">
                        '.$Elemento.'
                    </li>';
        } else {
            break;
        }
    }
}
