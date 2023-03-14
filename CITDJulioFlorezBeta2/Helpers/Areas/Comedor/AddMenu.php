<?php
session_start();
include('../../Helper/Servidor.php');

if ($PK_Id_User != '' && isset($_POST['Type'])) {
    if (isset($_POST['Orig'])) {
        $OrigPDF = $_POST['Orig'];
    }

    $Directorio = "../../Docs/Comedor/";

    if ($_POST['Type'] == 'Guardar') {
        if (isset($_POST['Orig'])) {
            unlink($Directorio . $OrigPDF);
        }

        $Fecha = date('Y-m-d H:i:s', time());
        $NomPDF_Com = $_FILES['Menu']['name'];
        
        $Archivo = basename($NomPDF_Com);
        $TipoArchivo = strtolower(pathinfo($Archivo, PATHINFO_EXTENSION));
        $NewName = $PK_Id_User."id".uniqid().".".$TipoArchivo;
        move_uploaded_file($_FILES["Menu"]["tmp_name"], "$Directorio/$NewName");

        $Cns = "INSERT INTO Comedor(
        NomPDF_Com, FK_User_Com, Fech_Com)
        VALUES(
        '$NewName', '$PK_Id_User', '$Fecha')";

        $Cnx = mysqli_query($Servidor, $Cns);
    }

    if ($_POST['Type'] == 'Eliminar') {
        unlink($Directorio . $OrigPDF);
    }

?>
    <script>
        window.location = 'Index.php?Pg=Comedor';
    </script>
<?php
}
