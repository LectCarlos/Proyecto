<?php
require_once('Helper/Servidor.php');

if ($PK_Id_User != '') {
    if ($RowRol['Name_Rol'] == 'Estudiante') {
        $Cns = "SELECT * FROM Usuarios, Cursos,
        Estudiantes, Servicio_Social
        WHERE
        Estudiantes.FK_User_Est = Usuarios.PK_Id_User AND
        Cursos.PK_Id_Cur = Estudiantes.FK_Cur_Est AND
        Usuarios.PK_Id_User = '$PK_Id_User'";

        $Cxn = mysqli_query($Servidor, $Cns);
        $Row = $Cxn->fetch_array();
    } else {
        $Row = $RowRol;
    }
} else {
?>
    <script>
        window.location = 'Index.php?Pg=Iniciar sesión';
    </script>
<?php
    exit();
}
?>

<section class="Space"></section>
<main id="Perfil">
    <div class="Informacion">
        <div class="Imagen" data-element="Btn-Edit-Img">
            <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" class="Perfil" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            <button class="EditarFoto" id="EditarFoto" type="button">
                <img src="Icons/Editar.png" alt="">
            </button>
            <button class="EditarIcon" id="EditarIcon" type="button">
                <img src="Icons/Editar.png" alt="">
            </button>
        </div>
        <div class="Tabla">
            <div class="Item">
                <p class="Text Sub"> Nombre: </p>
                <p class="Text">
                    <?php echo $Row['Nombre_User'] ?>
                </p>
            </div>
            <div class="Item">
                <p class="Text Sub"> Apellido: </p>
                <p class="Text">
                    <?php echo $Row['Apellido_User'] ?>
                </p>
            </div>
            <?php
            if ($RowRol['Name_Rol'] == 'Estudiante') {
            ?>
                <div class="Item">
                    <p class="Text Sub"> Curso: </p>
                    <p class="Text">
                        <?php echo $Row['Nom_Cur'] ?>
                    </p>
                </div>
            <?php
            }
            ?>
            <div class="Item">
                <p class="Text Sub"> Edad: </p>
                <p class="Text">
                    <?php echo $Row['Edad_User'] ?>
                </p>
            </div>
            <div class="Item">
                <p class="Text Sub"> Celular: </p>
                <p class="Text">
                    <?php echo $Row['Cel_User'] ?>
                </p>
            </div>
            <?php
            if ($RowRol['Name_Rol'] == 'Estudiante') {
            ?>
                <div class="Item">
                    <p class="Text Sub"> S. Social: </p>
                    <p class="Text">
                        <?php echo $Row['Cel_User'] ?>
                    </p>
                </div>
            <?php
            }
            ?>
            <div class="Item">
                <p class="Text Sub"> T.I / C.C.: </p>
                <p class="Text">
                    <?php echo $Row['Ident_User'] ?>
                </p>
            </div>
            <div class="Item">
                <p class="Text Sub"> Correo Per: </p>
                <p class="Text">
                    <?php echo $Row['CorreoPer_User'] ?>
                </p>
            </div>
            <div class="Item">
                <p class="Text Sub"> Correo Inst: </p>
                <p class="Text">
                    <?php echo $Row['CorreoInst_User'] ?>
                </p>
            </div>
        </div>
    </div>
    <div class="Box">
        <div class="Notificaciones" id="IdNotificaciones">
        </div>
        <button class="Btn-Form-Publicar" data-element="Btn-Form-Publicar" type="button">
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" class="Perfil" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <p class="Text">¿Qué quieres mensionar el día de hoy?</p>
            <img src="Icons/Imagen.png" class="Icon" alt="">
        </button>
    </div>
</main>
<section class="Space"></section>
<div id="demo"></div>

<?php
if ($RowRol['Name_Rol']  == 'Estudiante') {
    require_once('Blocs/All/ServicioSocial.php');
}
require_once('Blocs/Perfil/FotoUser.php');
require_once('Blocs/Perfil/Reportar.php');
require_once('Blocs/Perfil/Publicar.php');
?>