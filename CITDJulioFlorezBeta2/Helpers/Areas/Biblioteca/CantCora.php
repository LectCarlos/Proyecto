<?php
session_start();

if (isset($_POST['CantCora'])) {
    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $CantCora = $_POST['CantCora'];
    $ValCora = $_POST['ValCora'];
    $Libro = $_SESSION['PK_Id_Lib'];
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Consulta = "SELECT * FROM LikesLib
    WHERE
    LikesLib.FK_User_Lik = '$PK_Id_User' AND
    LikesLib.FK_Lib_Lik = '$Libro'";

    $Conexion = mysqli_query($Servidor, $Consulta);
    
    $Resultado = $Servidor->query($Consulta);
    $NumRows = $Resultado->num_rows;

    if ($NumRows != 0) {
        $Consulta2 = "UPDATE Libros
        SET
        Libros.CantLik_Lib = '$CantCora'
        WHERE
        Libros.PK_Id_Lib = '$Libro'";
        
        $Conexion2 = mysqli_query($Servidor, $Consulta2);

        $Consulta3 = "DELETE FROM LikesLib
        WHERE
        LikesLib.FK_User_Lik = '$PK_Id_User' AND
        LikesLib.FK_Lib_Lik = '$Libro'";

        $Conexion3 = mysqli_query($Servidor, $Consulta3);
    } else {
        $Consulta2 = "INSERT INTO LikesLib(
        LikeLib_Lik, FK_Lib_Lik, FK_User_Lik)
        VALUES(
        1, '$Libro', '$PK_Id_User')";
        $Conexion2 = mysqli_query($Servidor, $Consulta2);

        $Consulta3 = "UPDATE Usuarios, Libros SET
        Libros.CantLik_Lib = '$CantCora' WHERE
        Usuarios.PK_Id_User = '$PK_Id_User' AND
        Libros.PK_Id_Lib = '$Libro'";
        $Conexion3 = mysqli_query($Servidor, $Consulta3);
    }
}
?>