<?php
session_start();
if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];
    $Server = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    $Consulta = "SELECT * FROM Usuarios, Roles WHERE
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
    Usuarios.PK_Id_User = '$PK_Id_User'";

    $Conexion = mysqli_query($Server, $Consulta);
    $Row = $Conexion->fetch_array();

    $PK_Id_Est = $_POST['PK_Id_Est'];
    $PK_Id_Ser = $_POST['PK_Id_Ser'];

    $Consulta2 = "SELECT * FROM servicio_social WHERE
    servicio_social.PK_Id_Ser = '$PK_Id_Ser'";

    $ConsultaEst = "SELECT * FROM Usuarios, Estudiantes, Cursos WHERE
    Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur AND
    Estudiantes.FK_User_Est = Usuarios.PK_Id_User AND
    Estudiantes.PK_Id_Est = '$PK_Id_Est'";

    $Conexion2 = mysqli_query($Server, $Consulta2);
    $Row2 = $Conexion2->fetch_array();

    $ConexionEst = mysqli_query($Server, $ConsultaEst);
    $RowEst = $ConexionEst->fetch_array();
} else {
?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
    <?php
    exit();
}

if (isset($_POST['Type'])) {
    if ($_POST['Type'] == 'Verificar') {
    ?>
        <section class="Space" data-title="true">
            <h5 class="Title SuperBig"> Verificar el servicio social del estudiante </h5>
        </section>
        <form id="MoreHours" class="needs-validation Verificacion" method="POST" action="" novalidate>
            <div class="Columna">
                <p class="Text Verificar">
                    <b><?php echo $Row['Apellido_User'] . ' ' . $Row['Nombre_User'] ?></b> -
                    <b><?php echo $RowEst['Apellido_User'] . ' ' . $RowEst['Nombre_User'] ?></b> -
                    <b><?php echo $RowEst['Nom_Cur'] ?></b>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur quas dicta voluptatem eaque laborum,
                    temporibus natus repellendus corporis, soluta autem voluptate ipsa. Cum ex tenetur odit tempora aspernatur
                    recusandae quam.
                    <br>
                    <br>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. At quam perspiciatis error debitis odio fugiat esse
                    exercitationem! Quod, sapiente tempore! Magnam similique quae adipisci ipsam laudantium facere nisi est
                    dignissimos?
                </p>
            </div>
            <div class="BtnsSDC">
                <button class="Btn Verificar" type="button">
                    <div class="Image">
                        <img src="Icons/Verificado.png" alt="">
                    </div>
                    <p class="Text"> Verificar </p>
                    <div class="Hitbox"></div>
                    <input type="hidden" value="<?php echo $PK_Id_Est ?>" data-element="PK_Id_Est" autocomplete="off" required disable>
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
    if ($_POST['Type'] == 'Agregar') {
    ?>
        <section class="Space" data-title="true">
            <h5 class="Title SuperBig"> Agregar horas sociales </h5>
        </section>
        <form id="MoreHours" class="Row Need-Validation" method="POST" action="" novalidate>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Fecha: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="date" class="form-control Text" data-element="Day_Ser" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Entrada:</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrEn_Ser" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Salida:</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrSa_Ser" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-7">
                <label class="form-label Title Min">Trabajo: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Job_Ser" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-5">
                <label class="form-label Title Min">Horas trabajadas: *</label>
                <div class="Input HrsMin" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" min="1" max="99" data-element="Hours" placeholder="Horas" autocomplete="off">
                    <h5 class="Title IptClr">:</h5>
                    <input type="number" class="form-control Text AllClr" min="1" max="59" data-element="Minutes" data-notvalide="true" placeholder="Minutos" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-12">
                <label for="Job_Ser" class="form-label Title Min"> Firma del supervisor: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Firm_Ser" value="<?php echo $Row['Nombre_User'] . ' - ' . $Row['Name_Rol'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="BtnsSDC Col-12">
                <button class="Btn Agregar" type="button">
                    <div class="Image">
                        <img src="Icons/Agregar.png" alt="">
                    </div>
                    <p class="Text"> Agregar </p>
                    <div class="Hitbox"></div>
                    <input type="hidden" value="<?php echo $PK_Id_Est ?>" data-element="PK_Id_Est" autocomplete="off">
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

    if ($_POST['Type'] == 'Editar') {
    ?>
        <section class="Space" data-title="true">
            <h5 class="Title SuperBig"> Editar horas sociales </h5>
        </section>
        <form id="MoreHours" class="Row Need-Validation" method="POST" action="" novalidate>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Fecha: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="date" class="form-control Text" data-element="Day_Ser" value="<?php echo $Row2['Day_Ser'] ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Entrada:</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrEn_Ser" value="<?php echo $Row2['HrEn_Ser'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Salida:</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrSa_Ser" value="<?php echo $Row2['HrSa_Ser'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-7">
                <label class="form-label Title Min">Trabajo: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Job_Ser" value="<?php echo $Row2['Job_Ser'] ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-5">
                <label class="form-label Title Min">Horas trabajadas: *</label>
                <div class="Input HrsMin" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" min="1" max="99" data-element="Hours" placeholder="Horas" value="<?php echo $_POST['Hours'] ?>" autocomplete="off">
                    <h5 class="Title IptClr">:</h5>
                    <input type="number" class="form-control Text AllClr" min="1" max="59" data-element="Minutes" data-notvalide="true" placeholder="Minutos" value="<?php echo $_POST['Minutes'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-12">
                <label for="Job_Ser" class="form-label Title Min"> Firma del supervisor: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Firm_Ser" value="<?php echo $Row['Nombre_User'] . ' - ' . $Row['Name_Rol'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="BtnsSDC Col-12">
                <button class="Btn Editar" type="button">
                    <div class="Image">
                        <img src="Icons/Editar.png" alt="">
                    </div>
                    <p class="Text"> Editar </p>
                    <div class="Hitbox"></div>
                    <input type="hidden" value="<?php echo $PK_Id_Est ?>" data-element="PK_Id_Est" autocomplete="off">
                    <input type="hidden" value="<?php echo $PK_Id_Ser ?>" data-element="PK_Id_Ser" autocomplete="off">
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

    if ($_POST['Type'] == 'Eliminar') {
    ?>
        <section class="Space" data-title="true">
            <h5 class="Title SuperBig"> Eliminar horas sociales </h5>
        </section>
        <form id="MoreHours" class="Row Need-Validation" method="POST" action="" novalidate>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Fecha: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="date" class="form-control Text" data-element="Day_Ser" value="<?php echo $Row2['Day_Ser'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Entrada:</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrEn_Ser" value="<?php echo $Row2['HrEn_Ser'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-3">
                <label class="form-label Title Min">Salida:</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="time" class="form-control Text" data-element="HrSa_Ser" value="<?php echo $Row2['HrSa_Ser'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-7">
                <label class="form-label Title Min">Trabajo: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Job_Ser" value="<?php echo $Row2['Job_Ser'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-5">
                <label class="form-label Title Min">Horas trabajadas: *</label>
                <div class="Input HrsMin" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" min="0" max="100" data-element="Hours" placeholder="Horas" value="<?php echo $_POST['Hours'] ?>" autocomplete="off" disabled>
                    <h5 class="Title IptClr">:</h5>
                    <input type="number" class="form-control Text AllClr" min="1" max="59" data-element="Minutes" placeholder="Minutos" value="<?php echo $_POST['Minutes'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-12">
                <label for="Job_Ser" class="form-label Title Min"> Firma del supervisor: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Firm_Ser" value="<?php echo $Row['Nombre_User'] . ' - ' . $Row['Name_Rol'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="BtnsSDC Col-12">
                <button class="Btn Eliminar" type="button">
                    <div class="Image">
                        <img src="Icons/Eliminar.png" alt="">
                    </div>
                    <p class="Text"> Eliminar </p>
                    <div class="Hitbox"></div>
                    <input type="hidden" value="<?php echo $PK_Id_Est ?>" data-element="PK_Id_Est" autocomplete="off">
                    <input type="hidden" value="<?php echo $PK_Id_Ser ?>" data-element="PK_Id_Ser" autocomplete="off">
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
}
?>

<div id="demo"></div>