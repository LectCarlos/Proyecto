<?php
session_start();
include('../../Helper/Servidor.php');

if ($PK_Id_User != '' && isset($_POST['Type'])) {
    $OrigFoto = $_POST['Orig'];
    $Directorio = "../../Images/Usuarios/FotosPerfil/";

    if ($_POST['Type'] == 'Guardar') {
        if ($OrigFoto != 'SinFoto.png') {
            unlink($Directorio . $OrigFoto);
        }
        
        $IdImg_User = $_FILES['Foto']['name'];

        $Archivo = basename($IdImg_User);
        $TipoArchivo = strtolower(pathinfo($Archivo, PATHINFO_EXTENSION));
        $NewName = sprintf($PK_Id_User."id%s_%d.%s", uniqid(), 0, $TipoArchivo);
        move_uploaded_file($_FILES["Foto"]["tmp_name"], "$Directorio/$NewName");

        $Cns2 = "UPDATE Usuarios SET
        IdImg_User = '$NewName' WHERE
        PK_Id_User = '$PK_Id_User'";

        $Cnx2 = mysqli_query($Servidor, $Cns2);
    }

    if ($_POST['Type'] == 'Eliminar') {
        $XFoto = "UPDATE Usuarios SET
        IdImg_User = 'SinFoto.png' WHERE
        PK_Id_User = '$PK_Id_User'";

        $Cnx = mysqli_query($Servidor, $XFoto);
        unlink($Directorio . $OrigFoto);
    }

?>
    <script>
        window.location = 'Index.php?Pg=Perfil';
    </script>
<?php
}
