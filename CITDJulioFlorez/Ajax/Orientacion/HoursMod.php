<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $Server = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
    $PK_Id_Est = $_POST['PK_Id_Est'];

    $Consulta = "SELECT * FROM Estudiantes, Cursos
    WHERE
    Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
    Estudiantes.PK_Id_Est = '$PK_Id_Est'";

    $Conexion = mysqli_query($Server, $Consulta);
    $Row = $Conexion->fetch_array();

    if (isset($_POST['Type']) && $_POST['Type'] != 'AgregarServicio') {
        if ($_POST['Type'] != 'Verificar') {
            $PK_Id_Ser = $_POST['PK_Id_Ser'];

            if ($_POST["HrEn_Ser"] != '' && $_POST["HrSa_Ser"] != '') {
                $HrEn = strtotime($_POST["HrEn_Ser"]);
                $HrSa = strtotime($_POST["HrSa_Ser"]);

                $HrEn = date("H:i a", $HrEn);
                $HrSa = date("H:i a", $HrSa);
            } else {
                $HrEn = $_POST["HrEn_Ser"];
                $HrSa = $_POST["HrSa_Ser"];
            }

            $Day = strtotime($_POST["Day_Ser"]);

            $Job_Ser = $_POST['Job_Ser'];
            $Firm_Ser = $_POST['Firm_Ser'];

            $Hours = $_POST['Hours'];
            $Minutes = $_POST['Minutes'];

            $Day = date("Y-m-d", $Day);
        }

        if (isset($_POST['Type'])) {
            if ($_POST['Type'] == 'Verificar') {
                date_default_timezone_set('America/Bogota');
                $Date = date('Y-m-d');

                $Consulta2 = "UPDATE Estudiantes
                SET
                ValSer_Est = 1,
                Verificado_Est = 1,
                FecFinSer_Est = '$Date'
                WHERE
                PK_Id_Est = '$PK_Id_Est'";

                $Conexion2 = mysqli_query($Server, $Consulta2);
?>
                <script>
                    window.location = 'Index.php?Pg=Servicio social<?php echo '&&IdCur=' . $Row['Nom_Cur'] . '&&IdEst=' . $Row['IdEst_Est'] ?>';
                </script>
            <?php
            }

            if ($_POST['Type'] == 'Agregar') {
                if ($HrEn != '' && $HrSa != '') {
                    $Consulta2 = "INSERT INTO servicio_social(
                    HrEn_Ser, HrSa_Ser, Job_Ser, Day_Ser,
                    FK_Est_Ser, Hours_Ser, Minutes_Ser, Firm_Ser)
                    VALUES(
                    '$HrEn', '$HrSa', '$Job_Ser', '$Day',
                    '$PK_Id_Est', '$Hours', '$Minutes', '$Firm_Ser')";
                } else {
                    $Consulta2 = "INSERT INTO servicio_social(
                    HrEn_Ser, HrSa_Ser, Job_Ser, Day_Ser,
                    FK_Est_Ser, Hours_Ser, Minutes_Ser, Firm_Ser)
                    VALUES(
                    NULL, NULL, '$Job_Ser', '$Day',
                    '$PK_Id_Est', '$Hours', '$Minutes', '$Firm_Ser')";
                }


                $Conexion2 = mysqli_query($Server, $Consulta2);
            ?>
                <script>
                    window.location = 'Index.php?Pg=Servicio social<?php echo '&&IdCur=' . $Row['Nom_Cur'] . '&&IdEst=' . $Row['IdEst_Est'] ?>';
                </script>
            <?php
            }

            if ($_POST['Type'] == 'Editar') {
                if ($HrEn != '' && $HrEn != '') {
                    $Consulta2 = "UPDATE servicio_social
                    SET
                    HrEn_Ser = '$HrEn',
                    HrSa_Ser = '$HrSa',
                    Job_Ser = '$Job_Ser',
                    Day_Ser = '$Day',
                    Hours_Ser = '$Hours',
                    Minutes_Ser = '$Minutes'
                    WHERE
                    PK_Id_Ser = '$PK_Id_Ser'";
                } else {
                    $Consulta2 = "UPDATE servicio_social
                    SET
                    HrEn_Ser = NULL,
                    HrSa_Ser = NULL,
                    Job_Ser = '$Job_Ser',
                    Day_Ser = '$Day',
                    Hours_Ser = '$Hours',
                    Minutes_Ser = '$Minutes'
                    WHERE
                    PK_Id_Ser = '$PK_Id_Ser'";
                }

                $Conexion2 = mysqli_query($Server, $Consulta2);
            ?>
                <script>
                    window.location = 'Index.php?Pg=Servicio social<?php echo '&&IdCur=' . $Row['Nom_Cur'] . '&&IdEst=' . $Row['IdEst_Est'] ?>';
                </script>
            <?php
            }

            if ($_POST['Type'] == 'Eliminar') {
                $Consulta2 = "DELETE FROM servicio_social WHERE PK_Id_Ser = '$PK_Id_Ser'";

                $Conexion2 = mysqli_query($Server, $Consulta2);
            ?>
                <script>
                    window.location = 'Index.php?Pg=Servicio social<?php echo '&&IdCur=' . $Row['Nom_Cur'] . '&&IdEst=' . $Row['IdEst_Est'] ?>';
                </script>
        <?php
            }
        }
    } else {
        $Sup_Ser = $_POST['Sup_Ser'];
        $Lugar_Ser = $_POST['Lugar_Ser'];
        $Nom_Ser = $_POST['Nom_Ser'];

        $FecInSer_Est = strtotime($_POST['FecInSer_Est']);
        $FecInSer_Est = date("Y-m-d", $FecInSer_Est);

        $Consulta = "UPDATE Estudiantes
        SET
        FecInSer_Est = '$FecInSer_Est',
        Sup_Ser = '$Sup_Ser',
        Lugar_Ser = '$Lugar_Ser',
        Nom_Ser = '$Nom_Ser',
        ValSer_Est = 2
        WHERE
        PK_Id_Est = '$PK_Id_Est'";

        $Conexion = mysqli_query($Server, $Consulta);
        ?>
        <script>
            window.location = 'Index.php?Pg=Servicio social<?php echo '&&IdCur=' . $Row['Nom_Cur'] . '&&IdEst=' . $Row['IdEst_Est'] ?>';
        </script>
<?php
    }
}