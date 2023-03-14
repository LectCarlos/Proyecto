<?php
session_start();

if (isset($_POST['Likes_Notf'])) {
    $Like_LN = $_POST['Like_LN'];
    $Id_Notf = $_POST['Id_Notf'];
    $Likes_Notf = $_POST['Likes_Notf'];
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $Consulta = "SELECT * FROM LikeNotf
    WHERE
    LikeNotf.FK_User_LN = '$PK_Id_User' AND
    LikeNotf.FK_Notf_LN = '$Id_Notf'";

    $Conexion = mysqli_query($Servidor, $Consulta);

    $Resultado = $Servidor->query($Consulta);
    $NumRows = $Resultado->num_rows;


    if ($NumRows != 0) {
        $Consulta2 = "UPDATE Notificaciones
        SET
        Notificaciones.Likes_Notf = '$Likes_Notf'
        WHERE
        Notificaciones.PK_Id_Notf = '$Id_Notf'";
        
        $Conexion2 = mysqli_query($Servidor, $Consulta2);

        $Consulta3 = "DELETE FROM LikeNotf
        WHERE
        LikeNotf.FK_User_LN = '$PK_Id_User' AND
        LikeNotf.FK_Notf_LN = '$Id_Notf'";

        $Conexion3 = mysqli_query($Servidor, $Consulta3);
    } else {
        $Consulta2 = "INSERT INTO LikeNotf(
        Like_LN, FK_Notf_LN, FK_User_LN)
        VALUES(
        1, '$Id_Notf', '$PK_Id_User')";

        $Conexion2 = mysqli_query($Servidor, $Consulta2);

        $Consulta3 = "UPDATE Notificaciones
        SET
        Notificaciones.Likes_Notf = '$Likes_Notf'
        WHERE
        Notificaciones.PK_Id_Notf = '$Id_Notf'";

        $Conexion3 = mysqli_query($Servidor, $Consulta3);
    }
}
?>