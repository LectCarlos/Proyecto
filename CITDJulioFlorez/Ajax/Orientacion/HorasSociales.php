<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $Validar = false;
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $ConsultaRol = "SELECT * FROM Usuarios, Roles WHERE
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND Usuarios.PK_Id_User = '$PK_Id_User'";

    $ConexionRol = mysqli_query($Servidor, $ConsultaRol);
    $RowRol = $ConexionRol->fetch_array();

    if (isset($_POST['PK_Id_Est']) && $_POST['PK_Id_Est'] != '') {
        $Validar = true;
    }

    if ($RowRol['Name_Rol']  == 'Estudiante' && (($RowRol['PK_Id_User'] != 1 && $RowRol['PK_Id_User'] != 2) || $Validar == false)) {
        $Consulta = "SELECT * FROM Estudiantes, servicio_social
        WHERE
        Estudiantes.PK_Id_Est = servicio_social.FK_Est_Ser AND
        Estudiantes.FK_User_Est = '$PK_Id_User'";

        $Estudiante = "SELECT * FROM Usuarios, Estudiantes, Cursos
        WHERE
        Estudiantes.FK_User_Est = Usuarios.PK_Id_User AND
        Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
        Usuarios.PK_Id_User = '$PK_Id_User'";

        $ConexionEst = mysqli_query($Servidor, $Estudiante);
    } else {
        $PK_Id_Est = $_POST['PK_Id_Est'];
        $Nom_Cur = $_POST['Nom_Cur'];

        $Consulta = "SELECT * FROM Estudiantes, Cursos, servicio_social
        WHERE
        Estudiantes.PK_Id_Est = servicio_social.FK_Est_Ser AND
        Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
        Estudiantes.IdEst_Est = '$PK_Id_Est' AND
        Cursos.Nom_Cur = '$Nom_Cur'";

        $Estudiante = "SELECT * FROM Usuarios, Estudiantes, Cursos
        WHERE
        Estudiantes.FK_User_Est = Usuarios.PK_Id_User AND
        Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
        Estudiantes.IdEst_Est = '$PK_Id_Est' AND
        Cursos.Nom_Cur = '$Nom_Cur'";

        $ConexionEst = mysqli_query($Servidor, $Estudiante);

        $Conexion2 = mysqli_query($Servidor, $Consulta);
        $Hours2 = 0;
        $Minutes2 = 0;

        while ($RowHrs2 = $Conexion2->fetch_array()) {
            $Hours2 = $Hours2 + $RowHrs2['Hours_Ser'];
            $Minutes2 = $Minutes2 + $RowHrs2['Minutes_Ser'];

            while ($Minutes2 >= 59) {
                $Minutes2 = $Minutes2 - 60;
                $Hours2++;
            }
        }

        $Total2 = $Hours2 . 'h y ' . $Minutes2 . 'min';

        $CantHours2 = "UPDATE Estudiantes, Cursos SET
            CantHours_Est = '$Hours2'
            WHERE
            Estudiantes.IdEst_Est = '$PK_Id_Est' AND
            Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
            Cursos.Nom_Cur = '$Nom_Cur'";

        $CnxCantHours2 = mysqli_query($Servidor, $CantHours2);
    }

    $ConexionTable = mysqli_query($Servidor, $Consulta);
    $Row = $ConexionTable->fetch_array();

    $Conexion = mysqli_query($Servidor, $Consulta);

    $Resultado = $Servidor->query($Consulta);
    $NumRows = $Resultado->num_rows;

    $RowEst = $ConexionEst->fetch_array();

    if ($RowEst['ValSer_Est'] != 3) {
?>
        <div class="Contenedor-Tabla">
            <table class="Tabla" id="TableHours">
                <tr>
                    <td colspan="5">
                        <p class="Text Left"><b> Nombre: </b><?php echo $RowEst['Apellido_User'] . ' ' . $RowEst['Nombre_User'] ?>
                        </p>
                    </td>
                    <td colspan="2">
                        <p class="Text Left"><b> Curso: </b><?php echo $RowEst['Nom_Cur'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <p class="Text Left"><b> Supervisor: </b><?php echo $RowEst['Sup_Ser'] ?></p>
                    </td>
                    <td colspan="2">
                        <p class="Text Left"><b> Lugar: </b><?php echo $RowEst['Lugar_Ser'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="Text Left"><b> Servicio social: </b><?php echo $RowEst['Nom_Ser'] ?></p>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <p class="Text Left"><b> Fecha de inicial: </b><?php echo $RowEst['FecInSer_Est'] ?></p>
                    </td>
                    <td colspan="3">
                        <p class="Text Left"><b> Fecha de finalización: </b><?php
                                                                            if ($RowEst['FecFinSer_Est'] != '0000-00-00') {
                                                                                echo $RowEst['FecFinSer_Est'];
                                                                            } else {
                                                                                echo "Al verificar";
                                                                            }
                                                                            ?></p>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="Text"><b> Fecha: </b></p>
                    </th>
                    <th>
                        <p class="Text"><b> Hr entrada: </b></p>
                    </th>
                    <th>
                        <p class="Text"><b> Hr salida: </b></p>
                    </th>
                    <th>
                        <p class="Text"><b> Trabajo: </b></p>
                    </th>
                    <th>
                        <p class="Text"><b> Firma: </b></p>
                    </th>
                    <th>
                        <p class="Text"><b> Hrs trabajadas: </b></p>
                    </th>
                    <th class="MaxWidht">
                        <?php
                        if ($RowRol['Name_Rol']  != 'Estudiante' || ($RowEst['Verificado_Est'] != 1 && ($RowRol['PK_Id_User'] == 1 || $RowRol['PK_Id_User'] == 2))) {
                            if ($RowEst['CantHours_Est'] >= 80) {
                        ?>
                                <div class="Btns">
                                    <button class="Btn Verificar" type="button">
                                        <img src="Icons/Verificado.png" alt="">
                                        <p class="Text"> Verificar </p>
                                        <div class="Hitbox"></div>
                                    </button>
                                    <input type="hidden" data-element="PK_Id_Est" value="<?php echo $RowEst['PK_Id_Est'] ?>">
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="Btns">
                                    <button class="Btn Agregar" type="button">
                                        <img src="Icons/Agregar.png" alt="">
                                        <p class="Text"> Agregar </p>
                                        <div class="Hitbox"></div>
                                    </button>
                                    <input type="hidden" data-element="PK_Id_Est" value="<?php echo $RowEst['PK_Id_Est'] ?>">
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </th>
                </tr>
                <?php
                $Hours = 0;
                $Minutes = 0;

                while ($RowHrs = $Conexion->fetch_array()) {
                    $RowDay = $RowHrs['Day_Ser'];

                    if ($RowHrs['HrEn_Ser'] != '' && $RowHrs['HrSa_Ser'] != '') {
                        $RowHrEn = $RowHrs['HrEn_Ser'];
                        $RowHrSa = $RowHrs['HrSa_Ser'];

                        $HrEn = strtotime($RowHrEn);
                        $HrSa = strtotime($RowHrSa);

                        $HrEn = date("h:i a", $HrEn);
                        $HrSa = date("h:i a", $HrSa);
                    } else {
                        $HrEn = $RowHrs['HrEn_Ser'];
                        $HrSa = $RowHrs['HrSa_Ser'];
                    }


                    $Day = strtotime($RowDay);


                    $Day = date("D d/M m/Y", $Day);

                    $Hours = $Hours + $RowHrs['Hours_Ser'];
                    $Minutes = $Minutes + $RowHrs['Minutes_Ser'];

                    while ($Minutes >= 59) {
                        $Minutes = $Minutes - 60;
                        $Hours++;
                    }
                ?>
                    <tr class="Datos">
                        <td>
                            <p class="Text"><?php echo $Day ?></p>
                        </td>
                        <td>
                            <p class="Text"><?php echo $HrEn ?></p>
                        </td>
                        <td>
                            <p class="Text"><?php echo $HrSa ?></p>
                        </td>
                        <td>
                            <p class="Text"><?php echo $RowHrs['Job_Ser'] ?></p>
                        </td>
                        <td>
                            <p class="Text"><?php echo $RowHrs['Firm_Ser'] ?></p>
                        </td>
                        <td>
                            <p class="Text H"><?php echo $RowHrs['Hours_Ser'] . 'h y ' . $RowHrs['Minutes_Ser'] . 'min' ?></p>
                        </td>
                        <td class="Botones">
                            <?php
                            if ($RowRol['Name_Rol']  != 'Estudiante' || ($RowEst['Verificado_Est'] != 1 && ($RowRol['PK_Id_User'] == 1 || $RowRol['PK_Id_User'] == 2))) {
                            ?>
                                <div class="Btns">
                                    <button class="Btn Editar" type="button">
                                        <img src="Icons/Editar.png" alt="">
                                        <p class="Text"> Editar </p>
                                        <div class="Hitbox"></div>
                                    </button>
                                    <button class="Btn Eliminar" type="button">
                                        <img src="Icons/Eliminar.png" alt="">
                                        <p class="Text"> Eliminar </p>
                                        <div class="Hitbox"></div>
                                    </button>
                                    <input type="hidden" data-element="Hours" value="<?php echo $RowHrs['Hours_Ser'] ?>">
                                    <input type="hidden" data-element="Minutes" value="<?php echo $RowHrs['Minutes_Ser'] ?>">
                                    <input type="hidden" data-element="PK_Id_Est" value="<?php echo $Row['PK_Id_Est'] ?>">
                                    <input type="hidden" data-element="PK_Id_Ser" value="<?php echo $RowHrs['PK_Id_Ser'] ?>">
                                </div>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php
                }

                $Total = $Hours . 'h y ' . $Minutes . 'min';

                ?>
                <tr>
                    <td colspan="5">
                    </td>
                    <td>
                        <p class="Text H"><?php echo '<b>Total:</b> ' . $Total ?></p>
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        if ($NumRows == 0) {
        ?>
            <article class="SinServicio">
                <h5 class="Title Min">
                    Estudiante sin horas sociales
                </h5>
            </article>
        <?php
        }
    } else {
        if ($RowRol['Name_Rol']  != 'Estudiante' || ($RowRol['PK_Id_User'] == 1 || $RowRol['PK_Id_User'] == 2)) {
            $Consulta2 = "SELECT * FROM Usuarios, Estudiantes, Cursos
            WHERE
            Estudiantes.FK_User_Est = Usuarios.PK_Id_User AND
            Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
            Estudiantes.IdEst_Est = '$PK_Id_Est' AND
            Cursos.Nom_Cur = '$Nom_Cur'";

            $Conexion2 = mysqli_query($Servidor, $Consulta2);

            $Row2 = $Conexion2->fetch_array();
        ?>
            <section class="Space" data-title="true">
                <h5 class="Title SuperBig"> Agregar servicio social al estudiante </h5>
            </section>
            <form id="AddServicioSocial" class="Row Need-Validation" method="POST" action="" novalidate>
                <div class="Elemento Col-8">
                    <label class="form-label Title Min">Nombre: *</label>
                    <div class="Input" data-disabled="true">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="text" class="form-control Text" data-element="Nombre_User" value="<?php echo $Row2['Apellido_User'] . ' ' . $Row2['Nombre_User'] ?>" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="Elemento Col-4">
                    <label class="form-label Title Min">Curso: *</label>
                    <div class="Input" data-disabled="true">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="number" class="form-control Text" data-element="Nom_Cur" value="<?php echo $Row2['Nom_Cur'] ?>" autocomplete="off" disabled>
                    </div>
                </div>
                <div class="Elemento Col-7">
                    <label class="form-label Title Min">Supervisor: *</label>
                    <div class="Input" data-validation="">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="text" class="form-control Text" data-element="Sup_Ser" autocomplete="off" required>
                    </div>
                </div>
                <div class="Elemento Col-5">
                    <label class="form-label Title Min">Lugar: *</label>
                    <div class="Input" data-validation="">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="text" class="form-control Text" data-element="Lugar_Ser" autocomplete="off" required>
                    </div>
                </div>
                <div class="Elemento Col-7">
                    <label class="form-label Title Min">Servicio social: *</label>
                    <div class="Input" data-validation="">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="text" class="form-control Text" data-element="Nom_Ser" autocomplete="off" required>
                    </div>
                </div>
                <div class="Elemento Col-5">
                    <label class="form-label Title Min">Fecha inicial: *</label>
                    <div class="Input" data-validation="">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <input type="date" class="form-control Text" data-element="FecInSer_Est" autocomplete="off" required>
                    </div>
                </div>
                <div class="BtnsSDC Col-12">
                    <button class="Btn Guardar" type="button">
                        <div class="Image">
                            <img src="Icons/Guardar.png" alt="">
                        </div>
                        <p class="Text"> Guardar </p>
                        <div class="Hitbox"></div>
                        <input type="hidden" data-element="PK_Id_Est" value="<?php echo $Row2['PK_Id_Est'] ?>">
                    </button>
                    <button class="Btn Cancelar" type="button">
                        <div class="Image">
                            <img src="Icons/Cerrar.png" alt="">
                        </div>
                        <p class="Text"> Cancelar </p>
                        <div class="Hitbox"></div>
                    </button>
                </div>
            </form>
        <?php
        }
        ?>
        <article class="SinServicio">
            <h5 class="Title Min">
                Estudiante sin servicio social
            </h5>
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
