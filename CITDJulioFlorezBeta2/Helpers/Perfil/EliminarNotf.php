<?php
session_start();
include('../../Helper/Servidor.php');

if ($PK_Id_User != '') {
    $PK_Id_UN = $_POST['PK_Id_UN'];
    $PK_Id_Notf = $_POST['PK_Id_Notf'];

    // $CnxUN = mysqli_query($Servidor, "DELETE FROM UserNotf WHERE FK_Notf_UN = '$PK_Id_UN'");
    // $CnxNotf = mysqli_query($Servidor, "DELETE FROM Notificaciones WHERE PK_Id_Notf = '$PK_Id_Notf'");
}
?>