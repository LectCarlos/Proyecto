<?php
session_start();
include('../../Helper/Servidor.php');

$CorreoPer_User = $_POST['Email'];
$CorreoInst_User = $_POST['Email'];
$Password_User = $_POST['Password'];

$Cns = "SELECT * FROM Usuarios
WHERE
(CorreoPer_User = '$CorreoPer_User'
OR
CorreoInst_User = '$CorreoInst_User') AND
Password_User = '$Password_User'";

$Cnx = mysqli_query($Servidor, $Cns);

$NumRows = mysqli_num_rows($Cnx);
$Row = $Cnx->fetch_array();

if ($NumRows) {
    $_SESSION['PK_Id_User'] = $Row['PK_Id_User'];
    $Validar = true;
} else {
    $Validar = false;
}

$Resultado = json_encode($Validar);
echo $Resultado;
?>