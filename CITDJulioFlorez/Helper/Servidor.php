<?php
$Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    date_default_timezone_set("America/Bogota");
    $CnsRol = "SELECT * FROM Usuarios, Roles
    WHERE
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
    Usuarios.PK_Id_User = '$PK_Id_User'";

    $CxnRol = mysqli_query($Servidor, $CnsRol);
    $RowRol = $CxnRol -> fetch_array();
}
