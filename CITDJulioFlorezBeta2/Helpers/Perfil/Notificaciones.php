<?php
session_start();
include('../../Helper/Servidor.php');

if ($PK_Id_User != '') {
    $Consulta = "SELECT * FROM Usuarios, Roles,
    UserNotf, Notificaciones
    WHERE
    (Usuarios.PK_Id_User = '$PK_Id_User' AND
    UserNotf.Para_UN = 'NULL' AND
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
    UserNotf.FK_User_UN = '$PK_Id_User' AND
    UserNotf.FK_User_UN = Usuarios.PK_Id_User AND
    UserNotf.FK_Notf_UN = Notificaciones.PK_Id_Notf)
    OR
    (UserNotf.Para_UN != 'NULL' AND
    Usuarios.PK_Id_User = '$PK_Id_User' AND
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
    UserNotf.FK_Notf_UN = Notificaciones.PK_Id_Notf)
    ORDER BY PK_Id_UN DESC LIMIT 50";

    $Conexion = mysqli_query($Servidor, $Consulta);
    $Resultado = $Servidor->query($Consulta);
    $NumRows = $Resultado->num_rows;

    if ($NumRows != 0) {
?>
        <div class="Caja">
            <?php
            while ($Row2 = $Conexion->fetch_array()) {
                $Consulta3 = "SELECT * FROM Usuarios, UserNotf, Roles WHERE
                UserNotf.Origen_Un = {$Row2['Origen_UN']} AND
                Usuarios.PK_Id_User = UserNotf.Origen_UN AND
                Usuarios.FK_Rol_User = Roles.PK_Id_Rol";

                $Conexion3 = mysqli_query($Servidor, $Consulta3);
                $Row3 = $Conexion3->fetch_array();

                $Consulta4 = "SELECT * FROM LikeNotf WHERE
                LikeNotf.FK_User_LN = '$PK_Id_User' AND
                LikeNotf.FK_Notf_LN = {$Row2['PK_Id_Notf']}";

                $Conexion4 = mysqli_query($Servidor, $Consulta4);
                $Row4 = $Conexion4->fetch_array();
                $Resultado4 = $Servidor->query($Consulta4);
                $NumRows4 = $Resultado4->num_rows;

                $Date = $Row2['Fecha_Notf'];
                $FechaEntero = strtotime($Date);
                $Hora = date("h:i:s a", $FechaEntero);
                $Fecha = date("D d/M m/Y", $FechaEntero);
            ?>
                <article class="Notificacion" data-important="<?php
                                                                if ($Row2['Import_Notf'] == 1) {
                                                                    echo 'true';
                                                                } else {
                                                                    echo 'false';
                                                                }
                                                                ?>">
                    <div class="Perfi">
                        <div class="Imagen">
                            <img src="Images/Usuarios/FotosPerfil/<?php echo $Row3['IdImg_User'] ?>" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
                        </div>
                        <div class="Important">
                            <img src="Icons/Important.png" alt="">
                        </div>
                    </div>
                    <div class="BoxCaja">
                        <div class="Tabla">
                            <div class="Elementos">
                                <p class="Text Direc"><?php
                                                        if ($Row3['CorreoInst_User'] != '') {
                                                            echo $Row3['CorreoInst_User'];
                                                        } else {
                                                            echo $Row3['CorreoPer_User'];
                                                        }
                                                        ?></p>
                                <div class="SubElement">
                                    <p class="Text MinText Rol Direc"><?php
                                                                        echo $Row3['Name_Rol'];
                                                                        if ($Row3['Origen_UN'] == 1 || $Row3['Origen_UN'] == 2) {
                                                                            echo " - Administrador";
                                                                        }
                                                                        ?></p>
                                    <p class="Text MinText Fecha Direc"><?php echo $Fecha ?></p>
                                </div>
                            </div>
                            <div class="Info">
                                <p class="Text Imp Ti"> Asunto: </p>
                                <p class="Text Imp"><?php echo $Row2['Asunto_Notf'] ?></p>
                            </div>
                            <div class="Info Under">
                                <p class="Text Ti"> Para: </p>
                                <?php
                                if ($Row2['Para_UN'] == 'NULL') {
                                ?>
                                    <p class="Text"><?php echo $Row2['CorreoPer_User'] ?></p>
                                <?php
                                } else {
                                ?>
                                    <div class="Tags" data-element="Tags">
                                        <p class="Text Para" data-element="Para-Count"></p>
                                        <?php
                                        $Para_UN = explode(',', $Row2['Para_UN']);

                                        for ($P = 0; $P < count($Para_UN); $P++) {
                                        ?>
                                            <p class="Tag Text"><?php
                                                                echo $Para_UN[$P];
                                                                if ($P != count($Para_UN) - 1) {
                                                                    echo ','
                                                                ?></p>
                                    <?php
                                                                }
                                                            }
                                    ?>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <p class="Text Asunto">
                                <?php echo $Row2['Texto_Notf'] ?>
                            </p>
                            <p class="Text MinText Hora Direc"><?php echo $Hora ?></p>
                        </div>
                        <button class="Like" type="button">
                            <img src="Icons/<?php
                                            if ($NumRows4 != 0) {
                                                if ($Row4['Like_LN'] == 1) {
                                                    echo 'Colores/LikeColor.png';
                                                } else {
                                                    echo 'Gris/LikeGris.png';
                                                }
                                            } else {
                                                echo 'Gris/LikeGris.png';
                                            }
                                            ?>" data-element="Like-Img" class="LikeImg" alt="">
                            <p class="Text" data-element="Text"><?php echo $Row2['Likes_Notf'] ?></p>
                            <div class="Hitbox"></div>
                            <input type="hidden" data-element="Like-Notf" value="<?php echo $Row2['Likes_Notf'] ?>" class="Likes_Notf" disabled>
                            <input type="hidden" data-element="Like-LN" value="<?php
                                                                                if ($NumRows4 != 0) {
                                                                                    echo $Row4['Like_LN'];
                                                                                } else {
                                                                                    echo 0;
                                                                                }
                                                                                ?>" class="Like_LN" disabled>
                        </button>
                    </div>
                    <div class="Elm-Rep">
                        <?php
                        if ($RowRol['Name_Rol'] == 'Administrador' || $Row3['Origen_UN'] == $PK_Id_User || $RowRol['PK_Id_User'] == 1 || $RowRol['PK_Id_User'] == 2) {
                        ?>
                            <button class="Eliminar" type="button">
                                <img src="Icons/Colores/EliminarColor.png" alt="">
                                <div class="Hitbox"></div>
                            </button>
                        <?php
                        }
                        if ($Row3['Name_Rol'] != 'Administrador' && $Row3['Origen_UN'] != $PK_Id_User && $Row3['Origen_UN'] != 1 && $Row3['Origen_UN'] != 2) {
                        ?>
                            <button class="Reportar" type="button">
                                <img src="Icons/Colores/ReportarColor.png" alt="">
                                <div class="Hitbox"></div>
                                <input type="hidden" data-element="Nom-User" value="<?php echo $Row3['Nombre_User'] ?>" class="Nom_User" disabled>
                            </button>
                        <?php
                        }
                        ?>
                    </div>
                    <input type="hidden" value="<?php echo $Row2['PK_Id_UN'] ?>" data-element="Id-UN" disabled>
                    <input type="hidden" value="<?php echo $Row2['PK_Id_Notf'] ?>" data-element="Id-Notf" disabled>
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
}
