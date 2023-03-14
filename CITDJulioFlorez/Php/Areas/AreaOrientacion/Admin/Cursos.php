<?php
if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $ConsultaRol = "SELECT * FROM Usuarios, Roles
    WHERE
    (Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND 
    Usuarios.PK_Id_User = '$PK_Id_User')";
    $ConexionRol = mysqli_query($Servidor, $ConsultaRol);
    $RowRol = $ConexionRol->fetch_array();

    if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['Name_Rol'] == 'Orientador' || $RowRol['Ident_User'] == 1028660884 || $RowRol['Ident_User'] == 1071163947) {
        $Consulta = "SELECT * FROM Cursos ORDER BY Nom_Cur DESC";

        $Conexion = mysqli_query($Servidor, $Consulta);
    } else {
?>
        <script>
            window.location = 'Index.php?Pg=Inicio';
        </script>
    <?php
        exit();
    }
} else {
    ?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}
?>

<section class="Space"></section>
<div id="demo"></div>
<main id="Cursos">
    <?php
    while ($Row = $Conexion->fetch_array()) {
    ?>
        <button class="Curso2" type="button">
            <img src="Images/Orientacion/Cursos/<?php echo $Row['IdImg_Cur'] ?>" onerror="this.src='Images/Orientacion/Cursos/SinImagen.png'" alt="">
            <p class="Text"><?php echo $Row['Nom_Cur'] ?></p>
            <input type="hidden" data-element="Curso" value="<?php echo $Row['Nom_Cur'] ?>">
            <div class="Hitbox"></div>
        </button>
    <?php
    }
    ?>
</main>
<section class="Space"></section>