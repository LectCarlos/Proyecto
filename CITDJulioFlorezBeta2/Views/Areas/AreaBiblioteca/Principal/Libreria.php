<?php
if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
    $Consulta = "SELECT * FROM Libros";

    $ConsultaRol = "SELECT * FROM Usuarios, Roles WHERE
    Usuarios.FK_Rol_User = Roles.PK_Id_Rol AND
    Usuarios.PK_Id_User = '$PK_Id_User'";

    $Conexion = mysqli_query($Servidor, $Consulta);
    $ConexionRol = mysqli_query($Servidor, $ConsultaRol);

    $RowRol = $ConexionRol->fetch_array();
} else {
?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}

if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['Name_Rol'] == 'Bibliotecario' || $RowRol['Ident_User'] == 1028660884 || $RowRol['Ident_User'] == 1071163947) {
?>
    <section class="Space"></section>
    <form id="AddLib" class="needs-validation" method="POST" action="" novalidate>
        <div class="Archivos">
            <div class="Input" data-element="ImgInput">
                <input type="file" class="File" name="IdImg_Lib" data-element="ImgLib" accept="image/jpg, image/jpeg" required>
                <div class="Texto">
                    <h5 class="Title Min" data-element="ImgTitle"> Ingresar portada </h5>
                    <p class="Text" data-element="ImgText"> (Sin archivo) </p>
                </div>
            </div>
            <div class="Input" data-element="PDFInput">
                <input type="file" class="File" name="ValPDF_Lib" data-element="PDFLib" accept="application/pdf">
                <div class="Texto">
                    <h5 class="Title Min" data-element="PDFTitle"> Ingresar PDF </h5>
                    <p class="Text" data-element="PDFText"> (Sin archivo) </p>
                </div>
            </div>
        </div>
        <div class="Formulario">
            <div class="Columna">
                <label for="Nom_Lib" class="form-label Title Min"> Libro: </label>
                <input type="text" class="form-control Text" name="Nom_Lib" data-element="NomLib" autocomplete="off">
            </div>
            <div class="Columna">
                <label for="Aut_Lib" class="form-label Title Min"> Autor: </label>
                <input type="text" class="form-control Text" name="Aut_Lib" data-element="AutLib" autocomplete="off">
            </div>
            <div class="Columna">
                <label for="Pag_Lib" class="form-label Title Min"> N° de páginas: </label>
                <input type="number" class="form-control Text" name="Pag_Lib" data-element="PagLib" autocomplete="off" min="5">
            </div>
            <div class="Columna">
                <label for="Epi_Lib" class="form-label Title Min"> Epílogo: </label>
                <textarea class="form-control Text" name="Epi_Lib" data-element="EpiLib" placeholder="Ingresa la información pedida" autocomplete="off"></textarea>
            </div>
        </div>
        <div class="Botones">
            <button class="Btn Guardar" name="Guardar" type="button">
                <div class="Image">
                    <img src="Icons/Guardar.png" alt="">
                </div>
                <p class="Text"> Guardar </p>
                <div class="Hitbox"></div>
            </button>
            <button class="Btn Cancelar" name="Cancelar" type="button">
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
<div id="demo"></div>
<section class="Space"></section>
<main id="Libreria">
    <div class="Encabezado">
        <h5 class="Title HiperBig"> Sección 1 </h5>
    </div>
    <article class="Seccion" data-seccion="0">
        <?php
        while ($Row = $Conexion->fetch_array()) {
            $Consulta2 = "SELECT * FROM LikesLib WHERE
            LikesLib.FK_User_Lik = '$PK_Id_User' AND
            LikesLib.FK_Lib_Lik = {$Row['PK_Id_Lib']}";

            $Conexion2 = mysqli_query($Servidor, $Consulta2);
            $Row2 = $Conexion2->fetch_array();
            $Resultado2 = $Servidor->query($Consulta2);
            $NumRows2 = $Resultado2->num_rows;
        ?>
            <button class="Libro">
                <input type="number" name="PK_Id_Lib" value="<?php echo $Row['PK_Id_Lib'] ?>" class="InfoOculta">
                <img src="Images/Biblioteca/Libros/<?php echo $Row['IdImg_Lib'] ?>" class="Portada" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'">
                <?php
                if ($Row['ValPDF_Lib'] != '') {
                ?>
                    <img src="Icons/Pdf.png" alt="" class="PDF">
                <?php
                }
                ?>
                <aside class="Shadow">
                    <p class="Text"><?php echo $Row['Nom_Lib'] ?></p>
                </aside>
                <div class="Corazones">
                    <img src="Icons/<?php
                                            if ($NumRows2 != 0) {
                                                if ($Row2['LikeLib_Lik'] == 1) {
                                                    echo 'Colores/CorazonColor.png';
                                                } else {
                                                    echo 'Corazon.png';
                                                }
                                            } else {
                                                echo 'Corazon.png';
                                            }
                                            ?>" onerror="this.src='Icons/Corazon.png'" alt="">
                    <p class="Text"><?php echo $Row['CantLik_Lib'] ?></p>
                </div>
                <div class="Hitbox"></div>
            </button>
        <?php
        }
        ?>
    </article>
</main>
<section class="Space"></section>