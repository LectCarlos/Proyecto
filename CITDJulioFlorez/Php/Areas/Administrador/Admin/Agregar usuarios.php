<?php
include('Helper/Servidor.php');

if ($PK_Id_User == '') {
    ?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}
?>
<section class="Space"></section>
<main id="Formulario">
    <div class="Info">
        <div class="Caja">
            <h5 class="Title"> Colegio I.T.D. Julio Florez </h5>
            <div class="Imagen">
                <img src="Icons/Colores/EscudoJF.png" alt="">
            </div>
        </div>
    </div>
    <div class="Informacion">
        <h5 class="Title"> Información </h5>
        <p class="Text">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam sed facilis, officia recusandae quos
            eaque! Et architecto libero repellat, molestiae rem non, nihil suscipit perspiciatis quos neque quidem!
            Harum, veritatis.
        </p>
    </div>
</main>
<section class="Space"></section>
<main id="Roles">
    <h5 class="Title HiperBig"> Escoge el cargo del nuevo usuario: </h5>
    <div class="Tabla" id="BtnCargos">
        <button class="Btn Administrador">
            <p class="Text"> Administrador </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="1" data-element="Cargo">
        </button>
        <button class="Btn Bibliotecario">
            <p class="Text"> Bibliotecario </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="3" data-element="Cargo">
        </button>
        <button class="Btn Cocinero">
            <p class="Text"> Cocinero </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="4" data-element="Cargo">
        </button>
        <button class="Btn Estudiante">
            <p class="Text"> Estudiante </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="2" data-element="Cargo">
        </button>
        <button class="Btn Orientador">
            <p class="Text"> Orientador </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="5" data-element="Cargo">
        </button>
        <button class="Btn Profesor">
            <p class="Text"> Profesor </p>
            <div class="Imagen">
                <img src="Images/Usuarios/FotosPerfil/SinFoto.png" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <div class="Hitbox"></div>
            <input type="hidden" name="FK_Rol_User" value="6" data-element="Cargo">
        </button>
    </div>
</main>
<div id="PartAddUser"></div>
<section class="Space" id="Visual" data-title="true">
    <h5 class="Title SuperBig"> Usuarios </h5>
</section>
<main id="Usuarios">
    <table class="Tabla" id="Tabla-Usuarios">
        <tr>
            <th>
                <h5 class="Title Min"> Id </h5>
            </th>
            <th>
                <h5 class="Title Min"> Nombre </h5>
            </th>
            <th>
                <h5 class="Title Min"> Apellido </h5>
            </th>
            <th>
                <h5 class="Title Min"> Edad </h5>
            </th>
            <th>
                <h5 class="Title Min"> Correo Per </h5>
            </th>
            <th>
                <h5 class="Title Min"> Correo Inst </h5>
            </th>
            <th>
                <h5 class="Title Min"> Celular </h5>
            </th>
            <th>
                <h5 class="Title Min"> Identificación </h5>
            </th>
            <th>
                <h5 class="Title Min"> Contraseña </h5>
            </th>
            <th>
                <h5 class="Title Min"> Cargo </h5>
            </th>
            <th></th>
        </tr>
        <?php
        $Consulta3 = "SELECT * FROM Usuarios, Roles WHERE
        Usuarios.FK_Rol_User = Roles.PK_Id_Rol ORDER BY Usuarios.PK_Id_User";

        $Conexion3 = mysqli_query($Servidor, $Consulta3);
        $Buscar = mysqli_fetch_array($Conexion3);

        while ($Row3 = $Conexion3->fetch_array()) {
            if ($Row3['PK_Id_User'] > 2) {
        ?>
                <tr id="AllUser">
                    <td>
                        <p class="Text Id"><?php echo $Row3['PK_Id_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Nombre_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Apellido_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Edad_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['CorreoPer_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['CorreoInst_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Cel_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Ident_User'] ?></p>
                    </td>
                    <td>
                        <p class="Text">
                            <input type="password" value="<?php echo $Row3['Password_User'] ?>" disabled>
                        </p>
                    </td>
                    <td>
                        <p class="Text"><?php echo $Row3['Name_Rol'] ?></p>
                    </td>
                    <td class="Botones">
                        <div class="Btns">
                            <button class="Btn Editar">
                                <img src="Icons/Editar.png" alt="">
                                <p class="Text"> Editar </p>
                                <div class="Hitbox"></div>
                            </button>
                            <button class="Btn Eliminar">
                                <img src="Icons/Eliminar.png" alt="">
                                <p class="Text"> Eliminar </p>
                                <div class="Hitbox"></div>
                            </button>
                            <input type="hidden" value="<?php echo $Row3['FK_Rol_User'] ?>" data-element="FK_Rol_User">
                            <input type="hidden" value="<?php echo $Row3['PK_Id_User'] ?>" data-element="PK_Id_User">
                        </div>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</main>
<div id="PartListUser"></div>
<section class="Space"></section>