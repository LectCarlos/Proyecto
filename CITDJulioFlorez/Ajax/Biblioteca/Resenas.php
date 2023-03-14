<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];
    $PK_Id_Lib = $_SESSION['PK_Id_Lib'];
    date_default_timezone_set("America/Bogota");

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
    $Consulta = "SELECT * FROM Usuarios, Roles, Libros, Coments WHERE
    Usuarios.PK_Id_User = Coments.FK_User_Cms AND
    Coments.FK_Lib_Cms = '$PK_Id_Lib' AND
    Coments.FK_Lib_Cms = Libros.PK_Id_Lib AND
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol";

    $Conexion = mysqli_query($Servidor, $Consulta);

    $Resultado = $Servidor->query($Consulta);
    $NumRows = $Resultado->num_rows;

    if ($NumRows != 0) {
?>
        <div class="Caja">
            <?php
            while ($Row = $Conexion->fetch_array()) {
                $FechaEntero = strtotime($Row['Fech_Cms']);
                $Hora = date("h:i:s a", $FechaEntero);
                $Fecha = date("D d/M m/Y", $FechaEntero);
            ?>
                <article class="Resena">
                    <div class="Imagen">
                        <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
                    </div>
                    <div class="BoxCaja">
                        <div class="Tabla">
                            <div class="Elementos">
                                <p class="Text Direc"><?php
                                                        if ($Row['CorreoInst_User'] != '') {
                                                            echo $Row['CorreoInst_User'];
                                                        } else {
                                                            echo $Row['CorreoPer_User'];
                                                        }
                                                        ?></p>
                                <div class="SubElement">
                                    <p class="Text MinText Rol Direc"><?php echo $Row['Name_Rol'] ?></p>
                                    <p class="Text MinText Fecha Direc"><?php echo $Fecha ?></p>
                                </div>
                            </div>
                            <p class="Text Asunto">
                                <?php echo $Row['Text_Cms'] ?>
                            </p>
                            <p class="Text MinText Hora Direc"><?php echo $Hora ?></p>
                        </div>
                    </div>
                    <?php
                    if ($Row['Name_Rol'] != 'Bibliotecario' && $Row['PK_Id_User'] != $PK_Id_User && $Row['Name_Rol'] != 'Administrador' && $Row3['Ident_User'] != 1028660884 && $Row3['Ident_User'] != 1071163947) {
                    ?>
                        <button class="Reportar">
                            <img src="Icons/Bandera.png" alt="">
                            <div class="HitboxR"></div>
                        </button>
                    <?php
                    }
                    ?>
                    <input type="text" value="<?php echo $Row['PK_Id_Cms'] ?>" class="Id_Notf InfoOculta" disabled>
                </article>
            <?php
            }
            ?>
        </div>
    <?php
    } else {
    ?>
        <article class="SinNotificaciones">
            <h5 class="Title SuperBig"> Sin notificaciones </h5>
        </article>
    <?php
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