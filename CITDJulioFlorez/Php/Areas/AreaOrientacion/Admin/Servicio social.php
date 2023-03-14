<?php
if (isset($_SESSION['PK_Id_User']) || isset($_GET['IdEst'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];
    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $Consulta = "SELECT * FROM Usuarios, Roles
        WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND 
        Usuarios.PK_Id_User = '$PK_Id_User'";

    $Conexion = mysqli_query($Servidor, $Consulta);
    $RowRol = $Conexion->fetch_array();

    if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['Name_Rol'] == 'Orientador' || $RowRol['Ident_User'] == 1028660884 || $RowRol['Ident_User'] == 1071163947) {
        $PK_Id_Est = $_GET['IdEst'];
        $Nom_Cur = $_GET['IdCur'];

        $Consulta2 = "SELECT * FROM Usuarios, Estudiantes, Cursos
        WHERE
        Estudiantes.IdEst_Est = '$PK_Id_Est' AND
        Cursos.PK_Id_Cur = Estudiantes.FK_Cur_Est AND
        Cursos.Nom_Cur = '$Nom_Cur' AND
        Usuarios.PK_Id_User = Estudiantes.FK_User_Est";

        $Conexion2 = mysqli_query($Servidor, $Consulta2);
        $Row2 = $Conexion2->fetch_array();
?>
        <section class="Space"></section>
        <main id="ServicioSocial">
        </main>
        <?php
        if ($Row2['Verificado_Est'] == 1) {
        ?>
            <article id="ServicioVerificado">
                <div class="Titulo">
                    <h5 class="Title SuperBig"><?php echo $Row2['Nombre_User'].' - '.$Row2['Nom_Cur'] ?></h5>
                    <div class="Line"></div>
                </div>
                <p class="Text">
                    <img class="Escudo" src="Icons/Colores/EscudoJF.png">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime aliquid accusantium et at eveniet. Quo a
                    dolores cum totam necessitatibus doloribus minima, odio laboriosam ex exercitationem, nostrum veniam perferendis
                    earum?
                </p>
                <p class="Text T2">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae maiores, architecto illum exercitationem
                    tempore numquam possimus deleniti maxime esse voluptas ab id laborum dicta suscipit obcaecati. Tempore, quis!
                    Adipisci, ipsam?
                </p>
                <img class="Medalla" src="Icons/Colores/MedallaColor.png">
            </article>
        <?php
        }
        ?>
        <div id="PartMoreHours">
        </div>
    <?php
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