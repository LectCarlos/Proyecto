<?php
session_start();
include('../../../Helper/Servidor.php');

if (isset($_POST['IdUser'])) {
    $IdUser = $_POST['IdUser'];

    if ($_POST['RolUser'] == 2) {
        $Consulta = "SELECT * FROM Usuarios, Roles,
        Estudiantes, Cursos
        WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
        Usuarios.PK_Id_User = '$IdUser' AND
        Usuarios.PK_Id_User = Estudiantes.FK_User_Est AND
        Estudiantes.FK_Cur_Est = Cursos.PK_Id_Cur";
    } else {
        $Consulta = "SELECT * FROM Usuarios, Roles
        WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
        Usuarios.PK_Id_User = '$IdUser'";
    }

    $Conexion = mysqli_query($Servidor, $Consulta);
    $Row = $Conexion->fetch_array();
}

if (isset($_POST['Type'])) {
    if ($_POST['Type'] == 'Editar') {
?>
        <section class="Space" id="Visual" data-title="true">
            <h5 class="Title SuperBig"> Editar usuario: </h5>
        </section>
        <form id="AddUser" class="Row Need-Validation" method="POST" action="" novalidate>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Nombre: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Nombre_User" value="<?php echo $Row['Nombre_User'] ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Apellido: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Apellido_User" value="<?php echo $Row['Apellido_User'] ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Edad: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Edad_User" value="<?php echo $Row['Edad_User'] ?>" min="18" max="80" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-8">
                <label class="form-label Title Min">Correo personal: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="email" class="form-control Text" data-element="CorreoPer_User" value="<?php echo $Row['CorreoPer_User'] ?>" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-8">
                <label class="form-label Title Min">Correo institucional: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="email" class="form-control Text" data-element="CorreoInst_User" value="<?php echo $Row['CorreoInst_User'] ?>" autocomplete="off">
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">N° Celular: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Cel_User" value="<?php echo $Row['Cel_User'] ?>" min="0" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Doc. Identidad: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Ident_User" value="<?php echo $Row['Ident_User'] ?>" min="100000" autocomplete="off" required>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Contraseña: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="password" class="form-control Text" data-element="Password_User" value="<?php echo $Row['Password_User'] ?>" minlength="8" autocomplete="off" required>
                </div>
            </div>
            <?php
            if ($Row['Name_Rol'] == 'Estudiante') {
            ?>
                <div class="Elemento Col-4">
                    <label for="Nom_Cur" class="form-label Title Min"> Curso: *</label>
                    <div class="Input" data-validation="">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <select class="form-select Text" data-element="Nom_Cur" required>
                            <option selected value="<?php echo $Row['FK_Cur_Est'] ?>"> Elige un curso </option>
                            <option value="1"> 1104 </option>
                            <option value="2"> 1103 </option>
                            <option value="3"> 1102 </option>
                            <option value="4"> 1101 </option>
                            <option value="5"> 1004 </option>
                            <option value="6"> 1003 </option>
                            <option value="7"> 1002 </option>
                            <option value="8"> 1001 </option>
                            <option value="9"> 904 </option>
                            <option value="10"> 903 </option>
                            <option value="11"> 902 </option>
                            <option value="12"> 901 </option>
                            <option value="13"> 803 </option>
                            <option value="14"> 802 </option>
                            <option value="15"> 801 </option>
                            <option value="16"> 703 </option>
                            <option value="17"> 702 </option>
                            <option value="18"> 701 </option>
                            <option value="19"> 603 </option>
                            <option value="20"> 602 </option>
                            <option value="21"> 601 </option>
                        </select>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="BtnsSDC Col-12">
                <button class="Btn Editar" type="button">
                    <div class="Image">
                        <img src="Icons/Editar.png" alt="">
                    </div>
                    <p class="Text"> Editar </p>
                    <div class="Hitbox"></div>
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
        <section class="Space" id="Visual" data-title="true">
            <h5 class="Title SuperBig"> Eliminar usuario: </h5>
        </section>
        <form id="AddUser" class="Row Need-Validation" method="POST" action="" novalidate>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Nombre: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Nombre_User" value="<?php echo $Row['Nombre_User'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-6">
                <label class="form-label Title Min">Apellido: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="text" class="form-control Text" data-element="Apellido_User" value="<?php echo $Row['Apellido_User'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Edad: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Edad_User" value="<?php echo $Row['Edad_User'] ?>" min="18" max="80" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-8">
                <label class="form-label Title Min">Correo personal: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="email" class="form-control Text" data-element="CorreoPer_User" value="<?php echo $Row['CorreoPer_User'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-8">
                <label class="form-label Title Min">Correo institucional: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="email" class="form-control Text" data-element="CorreoInst_User" value="<?php echo $Row['CorreoInst_User'] ?>" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">N° Celular: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Cel_User" value="<?php echo $Row['Cel_User'] ?>" min="0" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Doc. Identidad: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="number" class="form-control Text" data-element="Ident_User" value="<?php echo $Row['Ident_User'] ?>" min="100000" autocomplete="off" disabled>
                </div>
            </div>
            <div class="Elemento Col-4">
                <label class="form-label Title Min">Contraseña: *</label>
                <div class="Input" data-disabled="true">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <input type="password" class="form-control Text" data-element="Password_User" value="<?php echo $Row['Password_User'] ?>" minlength="8" autocomplete="off" disabled>
                </div>
            </div>
            <?php
            if ($Row['Name_Rol'] == 'Estudiante') {
            ?>
                <div class="Elemento Col-4">
                    <label for="Nom_Cur" class="form-label Title Min"> Curso: *</label>
                    <div class="Input" data-disabled="true">
                        <div class="Icono">
                            <img src="Icons/Persona.png" alt="">
                        </div>
                        <select class="form-select Text" data-element="Nom_Cur" disabled>
                            <option selected value="<?php echo $Row['FK_Cur_Est'] ?>"> Elige un curso </option>
                            <option value="1"> 1104 </option>
                            <option value="2"> 1103 </option>
                            <option value="3"> 1102 </option>
                            <option value="4"> 1101 </option>
                            <option value="5"> 1004 </option>
                            <option value="6"> 1003 </option>
                            <option value="7"> 1002 </option>
                            <option value="8"> 1001 </option>
                            <option value="9"> 904 </option>
                            <option value="10"> 903 </option>
                            <option value="11"> 902 </option>
                            <option value="12"> 901 </option>
                            <option value="13"> 803 </option>
                            <option value="14"> 802 </option>
                            <option value="15"> 801 </option>
                            <option value="16"> 703 </option>
                            <option value="17"> 702 </option>
                            <option value="18"> 701 </option>
                            <option value="19"> 603 </option>
                            <option value="20"> 602 </option>
                            <option value="21"> 601 </option>
                        </select>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="BtnsSDC Col-12">
                <button class="Btn Eliminar" type="button">
                    <div class="Image">
                        <img src="Icons/Eliminar.png" alt="">
                    </div>
                    <p class="Text"> Eliminar </p>
                    <div class="Hitbox"></div>
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
} else {
    ?>
    <section class="Space" id="Visual" data-title="true">
        <h5 class="Title SuperBig"> Añadir usuario: </h5>
    </section>
    <form id="AddUser" class="Row Need-Validation" method="POST" action="" novalidate>
        <div class="Elemento Col-6">
            <label class="form-label Title Min">Nombre: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="text" class="form-control Text" data-element="Nombre_User" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-6">
            <label class="form-label Title Min">Apellido: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="text" class="form-control Text" data-element="Apellido_User" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-4">
            <label class="form-label Title Min">Edad: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="number" class="form-control Text" data-element="Edad_User" min="18" max="80" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-8">
            <label class="form-label Title Min">Correo personal: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="email" class="form-control Text" data-element="CorreoPer_User" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-8">
            <label class="form-label Title Min">Correo institucional: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="email" class="form-control Text" data-element="CorreoInst_User" autocomplete="off">
            </div>
        </div>
        <div class="Elemento Col-4">
            <label class="form-label Title Min">N° Celular: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="number" class="form-control Text" data-element="Cel_User" min="0" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-4">
            <label class="form-label Title Min">Doc. Identidad: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="number" class="form-control Text" data-element="Ident_User" min="100000" autocomplete="off" required>
            </div>
        </div>
        <div class="Elemento Col-4">
            <label class="form-label Title Min">Contraseña: *</label>
            <div class="Input" data-validation="">
                <div class="Icono">
                    <img src="Icons/Persona.png" alt="">
                </div>
                <input type="password" class="form-control Text" data-element="Password_User" minlength="8" autocomplete="off" required>
            </div>
        </div>
        <?php
        if (isset($_POST['Cargo']) && $_POST['Cargo'] == 'Estudiante') {
        ?>
            <div class="Elemento Col-4" data-validation="">
                <label for="Nom_Cur" class="form-label Title Min"> Curso: *</label>
                <div class="Input" data-validation="">
                    <div class="Icono">
                        <img src="Icons/Persona.png" alt="">
                    </div>
                    <select class="form-select Text" data-element="Nom_Cur" required>
                        <option selected value=""> Elige un curso </option>
                        <option value="1"> 1104 </option>
                        <option value="2"> 1103 </option>
                        <option value="3"> 1102 </option>
                        <option value="4"> 1101 </option>
                        <option value="5"> 1004 </option>
                        <option value="6"> 1003 </option>
                        <option value="7"> 1002 </option>
                        <option value="8"> 1001 </option>
                        <option value="9"> 904 </option>
                        <option value="10"> 903 </option>
                        <option value="11"> 902 </option>
                        <option value="12"> 901 </option>
                        <option value="13"> 803 </option>
                        <option value="14"> 802 </option>
                        <option value="15"> 801 </option>
                        <option value="16"> 703 </option>
                        <option value="17"> 702 </option>
                        <option value="18"> 701 </option>
                        <option value="19"> 603 </option>
                        <option value="20"> 602 </option>
                        <option value="21"> 601 </option>
                    </select>
                </div>
            </div>
        <?php
        }
        ?>
        <div class="BtnsSDC Col-12">
            <button class="Btn Agregar" type="button">
                <div class="Image">
                    <img src="Icons/Agregar.png" alt="">
                </div>
                <p class="Text"> Agregar </p>
                <div class="Hitbox"></div>
                <input type="hidden" data-element="Rol_User" value="<?php echo $_POST['FK_Rol_User'] ?>">
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