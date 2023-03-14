<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $IdUser = $_POST['IdUser'];
    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');

    if ($_POST['Cargo'] != 'Estudiante') {
        $Consulta = "SELECT * FROM Usuarios, Roles WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
        Usuarios.PK_Id_User = '$IdUser'";

        $Conexion = mysqli_query($Servidor, $Consulta);

        $Row = $Conexion->fetch_array();
    } else {
        $Consulta = "SELECT * FROM Usuarios, Roles, Estudiantes, Cursos WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
        Usuarios.PK_Id_User = '$IdUser' AND
        Usuarios.PK_Id_User = Estudiantes.FK_User_Est AND
        Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur";

        $Conexion = mysqli_query($Servidor, $Consulta);

        $Row = $Conexion->fetch_array();
    }

    if (isset($_POST['Type'])) {
        if ($_POST['Type'] == 'Edit') {
?>
            <section class="Space" id="Visual" data-title="true">
                <h5 class="Title SuperBig"> Editar usuario: </h5>
            </section>
            <form id="AddUser" class="needs-validation" method="POST" action="" novalidate>
                <input type="text" name="FK_Rol_User" value="<?php echo $Row['PK_Id_User'] ?>" class="InfoOculta">
                <div class="Columna">
                    <label for="Nombre_User" class="form-label Title Min"> Nombre: </label>
                    <input type="text" class="form-control Text" name="Nombre_User" value="<?php echo $Row['Nombre_User'] ?>" id="validationCustom02" autocomplete="off" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un nombre </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="Apellido_User" class="form-label Title Min"> Apellido: </label>
                    <input type="text" class="form-control Text" name="Apellido_User" value="<?php echo $Row['Apellido_User'] ?>" id="validationCustom03" autocomplete="off" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un nombre </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="Edad_User" class="form-label Title Min"> Edad: </label>
                    <input type="number" class="form-control Text" name="Edad_User" value="<?php echo $Row['Edad_User'] ?>" id="validationCustom04" autocomplete="off" min="8" max="99" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa una edad </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="CorreoPer_User" class="form-label Title Min"> Correro Personal: </label>
                    <input type="email" class="form-control Text" name="CorreoPer_User" value="<?php echo $Row['CorreoPer_User'] ?>" id="validationCustom05" autocomplete="off" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un correo </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="CorreoInst_User" class="form-label Title Min"> Correo Institucional: </label>
                    <input type="email" class="form-control Text" name="CorreoInst_User" value="<?php echo $Row['CorreoInst_User'] ?>" id="validationCustom06" placeholder="(No es necesario)" autocomplete="off">
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un correo </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="Cel_User" class="form-label Title Min"> Celular: </label>
                    <input type="number" class="form-control Text" name="Cel_User" value="<?php echo $Row['Cel_User'] ?>" id="validationCustom07" autocomplete="off" min="1000000" maxlength="12" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un número de celular </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="Ident_User" class="form-label Title Min"> Documento de identidad: </label>
                    <input type="number" class="form-control Text" name="Ident_User" value="<?php echo $Row['Ident_User'] ?>" id="validationCustom08" autocomplete="off" min="1000000" maxlength="16" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa un número de identidad </p>
                    </div>
                </div>
                <div class="Columna">
                    <label for="Password_User" class="form-label Title Min"> Contraseña: </label>
                    <input type="password" class="form-control Text" name="Password_User" value="<?php echo $Row['Password_User'] ?>" id="validationCustom09" autocomplete="off" minlength="8" required>
                    <div class="valid-feedback">
                        <p class="Text"> ¡Exelente! </p>
                    </div>
                    <div class="invalid-feedback">
                        <p class="Text"> Porfavor ingresa una contraseña </p>
                    </div>
                </div>
                <?php
                if (isset($_POST['Cargo'])) {
                    if ($_POST['Cargo'] == 'Estudiante') {
                ?>
                        <div class="Columna Curso">
                            <label for="Nom_Cur" class="form-label Title Min"> Curso: </label>
                            <select class="form-select Text" id="validationCustom10" name="Nom_Cur" required>
                                <option selected value=""> Elige un curso </option>
                                <option value="21"> 1104 </option>
                                <option value="20"> 1103 </option>
                                <option value="19"> 1102 </option>
                                <option value="18"> 1101 </option>
                                <option value="17"> 1004 </option>
                                <option value="16"> 1003 </option>
                                <option value="15"> 1002 </option>
                                <option value="14"> 1001 </option>
                                <option value="13"> 904 </option>
                                <option value="12"> 903 </option>
                                <option value="11"> 902 </option>
                                <option value="10"> 901 </option>
                                <option value="9"> 803 </option>
                                <option value="8"> 802 </option>
                                <option value="7"> 801 </option>
                                <option value="6"> 703 </option>
                                <option value="5"> 702 </option>
                                <option value="4"> 701 </option>
                                <option value="3"> 603 </option>
                                <option value="2"> 602 </option>
                                <option value="1"> 601 </option>
                            </select>
                            <div class="valid-feedback">
                                <p class="Text"> ¡Exelente! </p>
                            </div>
                            <div class="invalid-feedback">
                                <p class="Text"> Porfavor selecciona un curso </p>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="Select">
                    <button class="Btn Edit" name="EditarUsuario" type="submit">
                        <p class="Text"> Registrar usuario </p>
                    </button>
                </div>
            </form>
        <?php
        }

        if ($_POST['Type'] == 'Delete') {
        ?>
            <section class="Space" id="Visual" data-title="true">
                <h5 class="Title SuperBig"> Eliminar usuario: </h5>
            </section>
            <form id="AddUser" class="needs-validation" method="POST" action="" novalidate>
                <input type="text" name="FK_Rol_User" value="<?php echo $Row['PK_Id_User'] ?>" class="InfoOculta">
                <div class="Columna">
                    <label for="Nombre_User" class="form-label Title Min"> Nombre: </label>
                    <input type="text" class="form-control Text" name="Nombre_User" value="<?php echo $Row['Nombre_User'] ?>" disabled>
                </div>
                <div class="Columna">
                    <label for="Apellido_User" class="form-label Title Min"> Apellido: </label>
                    <input type="text" class="form-control Text" name="Apellido_User" value="<?php echo $Row['Apellido_User'] ?>" disabled>
                </div>
                <div class="Columna">
                    <label for="Edad_User" class="form-label Title Min"> Edad: </label>
                    <input type="number" class="form-control Text" name="Edad_User" value="<?php echo $Row['Edad_User'] ?>" min="8" max="99" disabled>
                </div>
                <div class="Columna">
                    <label for="CorreoPer_User" class="form-label Title Min"> Correro Personal: </label>
                    <input type="email" class="form-control Text" name="CorreoPer_User" value="<?php echo $Row['CorreoPer_User'] ?>" disabled>
                </div>
                <div class="Columna">
                    <label for="CorreoInst_User" class="form-label Title Min"> Correo Institucional: </label>
                    <input type="email" class="form-control Text" name="CorreoInst_User" value="<?php echo $Row['CorreoInst_User'] ?>" disabled>
                </div>
                <div class="Columna">
                    <label for="Cel_User" class="form-label Title Min"> Celular: </label>
                    <input type="number" class="form-control Text" name="Cel_User" value="<?php echo $Row['Cel_User'] ?>" min="1000000" maxlength="12" disabled>
                </div>
                <div class="Columna">
                    <label for="Ident_User" class="form-label Title Min"> Documento de identidad: </label>
                    <input type="number" class="form-control Text" name="Ident_User" value="<?php echo $Row['Ident_User'] ?>" min="1000000" maxlength="16" disabled>
                </div>
                <div class="Columna">
                    <label for="Password_User" class="form-label Title Min"> Contraseña: </label>
                    <input type="password" class="form-control Text" name="Password_User" value="<?php echo $Row['Password_User'] ?>" minlength="8" disabled>
                </div>
                <?php
                if (isset($_POST['Cargo'])) {
                    if ($_POST['Cargo'] == 'Estudiante') {
                ?>
                        <div class="Columna">
                            <label for="Nom_Cur" class="form-label Title Min"> Curso: </label>
                            <input type="number" class="form-control Text" name="Nom_Cur" value="<?php echo $Row['Nom_Cur'] ?>" minlength="8" disabled>
                        </div>
                <?php
                    }
                }
                ?>
                <div class="Select">
                    <button class="Btn Delete" name="EliminarUsuario" type="submit">
                        <p class="Text"> Eliminar usuario </p>
                    </button>
                </div>
            </form>
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
} else {
    ?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}
?>