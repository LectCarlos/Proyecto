<?php
session_start();
include('../../../Helper/Servidor.php');

if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['PK_Id_User'] == 1 || $RowRol['PK_Id_User'] == 2) {
    $NombreUser = $_POST['NombreUser'];
    $ApellidoUser = $_POST['ApellidoUser'];
    $EdadUser = $_POST['EdadUser'];
    $CorreoPerUser = $_POST['CorreoPerUser'];
    $CorreoInstUser = $_POST['CorreoInstUser'];
    $CelUser = $_POST['CelUser'];
    $IdentUser = $_POST['IdentUser'];
    $PasswordUser = $_POST['PasswordUser'];
    $RolUser = $_POST['RolUser'];

    $Registrar = "SELECT * FROM Usuarios WHERE Ident_User = '$IdentUser'";
    $Conexion2 = mysqli_query($Servidor, $Registrar);

    if (mysqli_num_rows($Conexion2) > 0) {
?>
        <script>
            window.location = 'Index.php?Pg=Agregar usuarios';
        </script>
    <?php
        exit();
    }

    $Consulta = "INSERT INTO Usuarios(
        Nombre_User, Apellido_User, Edad_User,
        CorreoPer_User, CorreoInst_User, Cel_User,
        Ident_User, Password_User, FK_Rol_User,
        IdImg_User)
        VALUES(
        '$NombreUser', '$ApellidoUser', '$EdadUser',
        '$CorreoPerUser', '$CorreoInstUser', '$CelUser',
        '$IdentUser', '$PasswordUser', '$RolUser',
        'SinFoto.png')";

    $Conexion = mysqli_query($Servidor, $Consulta);

    if ($_POST['RolUser'] == 2) {
        $Select = mysqli_query($Servidor, "SELECT * FROM Usuarios WHERE Ident_User = '$IdentUser'");
        $Row = $Select->fetch_array();

        $IdUser = $Row['PK_Id_User'];
        $Nom_Cur = intval($_POST['NomCur']);

        $Consulta2 = "INSERT INTO Estudiantes(
            FK_User_Est, FK_Cur_Est, ValSer_Est,
            FecInSer_Est, FecFinSer_Est, CantHours_Est,
            Verificado_Est)
            VALUES(
            '$IdUser', '$Nom_Cur', 3,
            0000-00-00, 0000-00-00, 0, 0)";

        $Conexion2 = mysqli_query($Servidor, $Consulta2);
    }
    ?>
    <script>
        window.location = 'Index.php?Pg=Agregar usuarios';
    </script>
<?php
} else {
?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}
?>