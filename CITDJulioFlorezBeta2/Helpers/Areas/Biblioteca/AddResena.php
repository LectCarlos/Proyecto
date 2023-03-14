<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    if (isset($_POST['Validar']) && $_POST['Validar'] == 1) {
        date_default_timezone_set('America/Bogota');
        
        $PK_Id_User = $_SESSION['PK_Id_User'];
        $PK_Id_Lib = $_SESSION['PK_Id_Lib'];
        $TextArea = $_POST['TextArea'];
        $Fecha = date('Y/m/d H:i:s');
        
        $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
        
        $Consulta = "INSERT INTO Coments(
        Text_Cms, Fech_Cms, FK_User_Cms, FK_Lib_Cms)
        VALUES(
        '$TextArea', '$Fecha', '$PK_Id_User', '$PK_Id_Lib')";
        $Conexion = mysqli_query($Servidor, $Consulta);

        $_POST['Validar'] = 0;
}
}