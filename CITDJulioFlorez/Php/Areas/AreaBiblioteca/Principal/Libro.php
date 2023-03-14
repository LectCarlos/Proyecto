<?php
if (isset($_SESSION['PK_Id_User'])) {
    if (isset($_SESSION['PK_Id_Lib'])) {
        $Libro = $_SESSION['PK_Id_Lib'];
        $PK_Id_User = $_SESSION['PK_Id_User'];

        $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
        $Consulta = "SELECT * FROM Libros WHERE
        Libros.PK_Id_Lib = '$Libro'";

        $Consulta2 = "SELECT * FROM Usuarios, LikesLib, Libros WHERE
        LikesLib.FK_User_Lik = Usuarios.PK_Id_User AND
        Usuarios.PK_Id_User = '$PK_Id_User' AND
        LikesLib.FK_Lib_Lik = '$Libro' AND
        Libros.PK_Id_Lib = '$Libro'";

        $Conexion = mysqli_query($Servidor, $Consulta);
        $Conexion2 = mysqli_query($Servidor, $Consulta2);

        $Row = $Conexion->fetch_array();
        $Row2 = $Conexion2->fetch_array();
    } else {
?>
        <script>
            window.location = 'Index.php?Pg=Libreria';
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

<section class="Space"></section>
<main id="Vista">
    <div class="Portada">
        <div class="Imagen">
            <img src="Images/Biblioteca/Libros/<?php echo $Row['IdImg_Lib'] ?>" class="Porta" alt="">
            <button class="Valoracion" type="button" id="BtnCora">
                <input type="number" value="<?php
                                            if (isset($Row2['LikeLib_Lik'])) {
                                                echo $Row2['LikeLib_Lik'];
                                            } else {
                                                echo '0';
                                            }
                                            ?>" class="ValCora InfoOculta">
                <input type="number" value="<?php echo $Row['CantLik_Lib'] ?>" class="CantCora InfoOculta">
                <div class="Image">
                    <img src="Icons/<?php
                                    if (isset($Row2['LikeLib_Lik'])) {
                                        if ($Row2['LikeLib_Lik'] == 1) {
                                            echo 'Colores/CorazonColor.png';
                                        } else {
                                            echo 'Corazon.png';
                                        }
                                    } else {
                                        echo 'Corazon.png';
                                    }
                                    ?>" onerror="this.src='Icons/Corazon.png'" alt="">
                </div>
                <p class="Text"><?php echo $Row['CantLik_Lib'] ?></p>
                <div class="Hitbox"></div>
            </button>
        </div>
        <div class="Caja">
            <div class="Caja2">
                <h5 class="Title"><?php echo $Row['Nom_Lib'] ?></h5>
                <p class="Text"><?php echo $Row['Epi_Lib'] ?></p>
            </div>
        </div>
    </div>
    <div class="Box">
        <div class="Resenas" id="Resenas">

        </div>
        <form class="needs-validation Publicacion" id="AddResena" method="POST" action="">
            <div class="Caja">
                <textarea class="form-control TextArea Text" data-element="TextArea" name="Texto" placeholder="¿Qué estás pensando?" autocomplete="off" required></textarea>
            </div>
            <div class="Botones">
                <button class="Btn Publicar" name="Publicar" type="button">
                    <div class="Image">
                        <img src="Icons/Avion.png" alt="">
                    </div>
                    <p class="Text"> Publicar </p>
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
    </div>
</main>
<div id="demo"></div>
<section class="Space"></section>
<main id="PDFLibro">
    <?php
    if ($Row['ValPDF_Lib'] != '') {
    ?>
        <input type="text" name="Archivo" value="<?php echo $Row['ValPDF_Lib']; ?>" class="Archivo InfoOculta">
        <div class="PDF">
            <embed class="PDFVisual" src="Docs/Biblioteca/<?php echo $Row['ValPDF_Lib']; ?>" type="application/pdf">
        </div>
    <?php
    } else {
    ?>
        <div class="SinPDF">
            <h5 class="Title HiperBig"> Sin PDF </h5>
        </div>
    <?php
    }
    ?>
    <div class="Prestamo">
        <h5 class="Title"> Prestamo de libros </h5>
        <p class="Text">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque delectus nulla ipsam perspiciatis, cum illum
            inventore, porro cupiditate explicabo, adipisci distinctio ad voluptatum modi voluptatibus eaque nisi
            voluptatem ullam in!
            <br>
            <br>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis dolores excepturi, facilis, molestias
            dolorem est et repellat quis voluptas, animi voluptatibus delectus voluptatem. Maxime fugit rem magnam
            adipisci ipsa quo!
        </p>
    </div>
</main>
<section class="Space"></section>
<form class="needs-validation Report" id="Reportar" method="POST" action="" novalidate>
    <h5 class="Title"> Reportar problema </h5>
    <div class="Columna Acusado">
        <label for="validationCustom01" class="form-label Title Min"> Acusado: </label>
        <input type="text" class="form-control Text" name="Acusado" id="validationCustom01" value="" autocomplete="off" disabled>
    </div>
    <div class="Columna">
        <label for="validationCustom04" class="form-label Title Min"> Tipo de problema: </label>
        <select class="form-select Text" id="validationCustom04" required>
            <option selected value=""> Reportar problema </option>
            <option> Desnudos </option>
            <option> Violencia </option>
            <option> Spam </option>
            <option> Acoso </option>
            <option> Lenguaje que incita al odio </option>
            <option> Información falsa </option>
            <option> Suicidio o autolesiones </option>
            <option> Otro problema </option>
        </select>
    </div>
    <div class="Columna">
        <label for="validationTextarea" class="form-label Title Min"> Escribenos lo sucedido: </label>
        <textarea class="form-control Text" id="validationTextarea" name="NameReporte" placeholder="Ingresa la información pedida" autocomplete="off" required></textarea>
    </div>
    <div class="Columna">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label Text" for="invalidCheck">
            Aceptas que será evaluado el reporte, y en todo caso de que sea falso, tendrás una sanción.
        </label>
    </div>
    <button class="Cerrar" type="button">
        <img src="Icons/Cerrar.png" alt="">
        <div class="Hitbox C"></div>
    </button>
    <button class="Btn" name="Reportar" type="submit">
        <p class="Text"> Enviar reporte </p>
    </button>
</form>
<div id="demo"></div>