<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
}
?>