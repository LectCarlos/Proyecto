<?php
if (isset($_SESSION['PK_Id_User']) && isset($_GET['Cur'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $ConsultaRol = "SELECT * FROM Usuarios, Roles
    WHERE
    (Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND 
    Usuarios.PK_Id_User = '$PK_Id_User')";
    $ConexionRol = mysqli_query($Servidor, $ConsultaRol);
    $RowRol = $ConexionRol->fetch_array();

    if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['Name_Rol'] == 'Orientador' || $RowRol['Ident_User'] == 1028660884 || $RowRol['Ident_User'] == 1071163947) {
        $ConsultaCur = "SELECT * FROM Cursos
        WHERE 
        Cursos.Nom_Cur = {$_GET['Cur']}";

        $Consulta = "SELECT * FROM Usuarios, Cursos, Estudiantes
        WHERE
        Usuarios.PK_Id_User = Estudiantes.FK_User_Est AND
        Cursos.PK_Id_Cur = Estudiantes.FK_Cur_Est AND
        Cursos.Nom_Cur = {$_GET['Cur']}
        ORDER BY
        Usuarios.Apellido_User";

        $Conexion = mysqli_query($Servidor, $Consulta);

        $Resultado = $Servidor->query($ConsultaCur);
        $NumRows = $Resultado->num_rows;

        $IdEst = 0;

        if ($NumRows == 0) {
?>
            <script>
                window.location = 'Index.php?Pg=Cursos';
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
<main id="Curso">
    <h5 class="Title HiperBig"> Curso <?php echo $_GET['Cur'] ?></h5>
    <div class="Box Num1"></div>
    <div class="Box Num2"></div>
</main>
<main id="Categoria">
    <p class="Text T"><b> Verde: </b> Sercicio social terminado </p>
    <p class="Text E"><b> Azul: </b> Sercicio social en proceso </p>
    <p class="Text S"><b> Rojo: </b> Sin sercicio social </p>
</main>
<main id="Estudiantes">
    <?php
    while ($Row = $Conexion->fetch_array()) {
        $IdEst++;
    ?>
        <a class="Estudiante" data-service="<?php
                                                        if ($Row['ValSer_Est'] == 1) {
                                                            echo 'T';
                                                        } else if ($Row['ValSer_Est'] == 2) {
                                                            echo 'E';
                                                        } else if ($Row['ValSer_Est'] == 3) {
                                                            echo 'S';
                                                        }
                                                        ?>" href="Index.php?Pg=Servicio social&&IdCur=<?php echo $_GET['Cur'].'&&IdEst='.$IdEst ?>">
            <div class="Fondo Num1">
                <div class="Box1">
                    <p class="Text"><?php echo '#'.$IdEst ?></p>
                    <div class="Image">
                        <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
                    </div>
                    <img src="Icons/Programacion.png" class="Icono" alt="">
                </div>
            </div>
            <div class="Fondo Num2">
                <div class="Box2">
                    <p class="Text Weight"><?php echo $Row['Apellido_User'] . ' ' . $Row['Nombre_User'] ?></p>
                    <p class="Text"></p>
                </div>
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" data-element="Estudiante" value="<?php echo $Row['PK_Id_User'] ?>">
        </a>
    <?php
    $ConsultaIdEst = "UPDATE Estudiantes SET
    IdEst_Est = '$IdEst'
    WHERE
    FK_User_Est = {$Row['PK_Id_User']}";

    $ConexionIdEst = mysqli_query($Servidor, $ConsultaIdEst);
    }
    ?>
</main>
<section class="Space"></section>

















<!--
    <button class="Estudiante" data-serviciosocial="<?php
                                                    /*
                                                        if ($Row['ValSer_Est'] == 1) {
                                                            echo 'T';
                                                        } else if ($Row['ValSer_Est'] == 2) {
                                                            echo 'E';
                                                        } else if ($Row['ValSer_Est'] == 3) {
                                                            echo 'S';
                                                        }
                                                        ?>" type="button">
            <div class="Image">
                <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Info">
                <p class="Text">
                    <b> Apellido: </b><?php echo $Row['Apellido_User'] ?>
                </p>
                <p class="Text">
                    <b> Nombre: </b><?php echo $Row['Nombre_User'] ?>
                </p>
            </div>
            <div class="BarSS"></div>
            <div class="Hitbox"></div>
            <input type="hidden" data-element="Estudiante" name="Estudiante" value="<?php echo $Row['PK_Id_User'] */ ?>">
        </button>
-->