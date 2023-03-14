<?php
if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
    $Consulta = "SELECT * FROM Usuarios, Roles WHERE Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND PK_Id_User = '$PK_Id_User'";
    $Conexion = mysqli_query($Servidor, $Consulta);
    $Row = $Conexion->fetch_array();
}
?>

<nav id="NavMenu">
    <div class="Banner">
        <a href="?Pg=Inicio" class="Link">
            <img src="Icons/Colores/EscudoJF.png" class="IconE" alt="">
            <h5 class="Title Min"> I.T.D Julio Florez </h5>
            <div class="Triangle"></div>
        </a>
    </div>
    <button class="AbrirNav">
        <img src="Icons/Menu.png" alt="" class="IconB">
    </button>
</nav>
<nav id="NavVertical">
    <div class="Header">
        <h5 class="Title Min"> I.T.D. Julio Florez </h5>
        <button class="CerrarNav">
            <img src="Icons/Cerrar.png" alt="" class="IconG">
        </button>
    </div>
    <?php
    if (isset($_SESSION['PK_Id_User'])) {
    ?>
        <a href="?Pg=Perfil" class="Perfil">
            <div class="Image">
                <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" class="IconP" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
            </div>
            <p class="Text">
                <?php
                echo $Row['Nombre_User'];
                ?>
            </p>
        </a>
    <?php
    }
    ?>
    <div class="Buscador">
        <img src="Icons/Lupa.png" class="IconN" alt="">
        <input type="text" class="Search" name="Search" placeholder="Buscar..." autocomplete="off" id="">
    </div>
    <ul class="BigLista">
        <li class="BigItem Red4">
            <ul class="Lista">
                <li class="Item">
                    <h5 class="Title Min"> Julio Florez </h5>
                </li>
                <li class="Item">
                    <a href="?pg=Inicio" class="Link">
                        <img src="Icons/Inicio.png" alt="" class="IconN">
                        <p class="Text"> Inicio </p>
                    </a>
                </li>
                <li class="Item">
                    <section class="Secciones BtnDrop" data-expanded="false">
                        <div class="Link Seccion">
                            <img src="Icons/Institucion.png" alt="" class="IconN">
                            <p class="Text"> Nuestra institución </p>
                            <img src="Icons/Flecha.png" alt="" class="IconM">
                            <div class="Hitbox"></div>
                        </div>
                        <ul class="Lista Drop">
                            <li class="Item">
                                <p class="Text TxBig"> ¿Quiénes somos? </p>
                            </li>
                            <li class="Item">
                                <a href="?Pg=¿Quiénes somos" class="Link">
                                    <img src="Icons/MVision.png" alt="" class="IconN">
                                    <p class="Text"> Misión - Visión </p>
                                    <img src="Icons/Historia.png" alt="" class="IconN">
                                    <p class="Text"> Historia </p>
                                    <img src="Icons/Ubicacion.png" alt="" class="IconN">
                                    <p class="Text"> Ubicación </p>
                                </a>
                            </li>
                            <li class="Item">
                                <p class="Text TxBig"> Símbolos </p>
                            </li>
                            <li class="Item">
                                <a href="?Pg=Símbolos" class="Link">
                                    <img src="Icons/Bandera.png" alt="" class="IconN">
                                    <p class="Text"> Bandera </p>
                                    <img src="Icons/Escudo.png" alt="" class="IconN">
                                    <p class="Text"> Escudo </p>
                                    <img src="Icons/Uniforme.png" alt="" class="IconN">
                                    <p class="Text"> Uniforme </p>
                                </a>
                            </li>
                        </ul>
                    </section>
                </li>
                <li class="Item">
                    <a href="?Pg=Especialidades" class="Link">
                        <img src="Icons/Especialidad.png" alt="" class="IconN">
                        <p class="Text"> Especialidades </p>
                    </a>
                </li>
                <li class="Item">
                    <section class="Secciones BtnDrop" data-expanded="false">
                        <div class="Link Seccion">
                            <img src="Icons/Informacion.png" alt="" class="IconN">
                            <p class="Text"> Información </p>
                            <img src="Icons/Flecha.png" alt="" class="IconM">
                            <div class="Hitbox"></div>
                        </div>
                        <ul class="Lista Drop">
                            <li class="Item">
                                <p class="Text TxBig"> Campos </p>
                            </li>
                            <li class="Item">
                                <a href="?Pg=Formación" class="Link">
                                    <img src="Icons/Historia.png" alt="" class="IconN">
                                    <p class="Text"> De formación </p>
                                </a>
                            </li>
                            <li class="Item">
                                <p class="Text TxBig"> Proyectos </p>
                            </li>
                            <li class="Item">
                                <a href="?Pg=P. Transversales" class="Link">
                                    <img src="Icons/Proyecto.png" alt="" class="IconN">
                                    <p class="Text"> Transversales </p>
                                </a>
                            </li>
                        </ul>
                    </section>
                </li>
                <?php
                if (isset($_SESSION['PK_Id_User'])) {
                    if ($Row['Name_Rol'] == 'Administrador' || $Row['Name_Rol'] == 'Orientador' || $Row['Name_Rol'] == 'Bibliotecario' || $Row['Ident_User'] == 1028660884 || $Row['Ident_User'] == 1071163947) {
                ?>
                        <li class="Item">
                            <a href="?Pg=Cursos" class="Link">
                                <img src="Icons/Cursos.png" alt="" class="IconN">
                                <p class="Text"> Cursos </p>
                            </a>
                        </li>
                        <li class="Item">
                            <a href="?Pg=Agregar usuarios" class="Link">
                                <img src="Icons/AddUser.png" alt="" class="IconN">
                                <p class="Text"> Agregar usuarios </p>
                            </a>
                        </li>
                <?php
                    }
                }
                ?>
                <?php
                if (isset($_SESSION['PK_Id_User'])) {
                ?>
                <li class="Item">
                    <a href="?Pg=Libreria" class="Link">
                        <img src="Icons/Libros.png" alt="" class="IconN">
                        <p class="Text"> Libreria </p>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </li>
        <li class="BigItem Red3">
            <ul class="Lista">
                <li class="Item">
                    <h5 class="Title Min"> Áreas </h5>
                </li>
                <li class="Item">
                    <a href="?Pg=Biblioteca" class="Link">
                        <img src="Icons/Libros.png" alt="" class="IconN">
                        <p class="Text"> Biblioteca </p>
                    </a>
                </li>
                <li class="Item">
                    <a href="?Pg=Comedor" class="Link">
                        <img src="Icons/Utensilios.png" alt="" class="IconN">
                        <p class="Text"> Comedor </p>
                    </a>
                </li>
                <li class="Item">
                    <a href="?Pg=Orientación" class="Link">
                        <img src="Icons/Direccion.png" alt="" class="IconN">
                        <p class="Text"> Orientación </p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="BigItem Red2">
            <ul class="Lista">
                <li class="Item">
                    <h5 class="Title Min"> Enlaces </h5>
                </li>
                <li class="Item">
                    <a href="https://portal.edupage.org" class="Link">
                        <img src="Icons/Edupage.png" alt="" class="IconN">
                        <p class="Text"> Edupage </p>
                    </a>
                </li>
                <li class="Item">
                    <a href="?Pg=Error" class="Link">
                        <img src="Icons/Persona.png" alt="" class="IconN">
                        <p class="Text"> Student Page </p>
                    </a>
                </li>
                <li class="Item">
                    <a href="https://www.flipsnack.com/5BCB758A9F7/aprende-en-casa-yosoyjulioflorez.html" class="Link">
                        <img src="Icons/Familia.png" alt="" class="IconN">
                        <p class="Text"> Bienestar Julio Florez </p>
                    </a>
                </li>
            </ul>
        </li>
        <?php
        if (!isset($_SESSION['PK_Id_User'])) {
        ?>
            <li class="BigItem Red1">
                <ul class="Lista">
                    <li class="Item">
                        <h5 class="Title Min"> Login </h5>
                    </li>
                    <li class="Item">
                        <a href="?Pg=Iniciar sesión" class="Link">
                            <img src="Icons/LogIn.png" alt="" class="IconN">
                            <p class="Text"> Iniciar sesión </p>
                        </a>
                    </li>
                </ul>
            </li>
        <?php
        }
        ?>
    </ul>
    <?php
    if (isset($_SESSION['PK_Id_User'])) {
    ?>
        <a href="?Pg=Cerrando sesión" class="Link CerrarSesion">
            <p class="Text"> Cerrar sesión </p>
            <img src="Icons/Salir.png" class="IconG" alt="">
        </a>
    <?php
    }
    ?>
</nav>
<div id="Background">
</div>