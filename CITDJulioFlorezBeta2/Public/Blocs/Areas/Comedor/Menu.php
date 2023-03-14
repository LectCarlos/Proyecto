<?php
require_once('Helper/Servidor.php');

if ($PK_Id_User != '') {
    $Cns = "SELECT * FROM Comedor ORDER BY PK_Id_Com DESC";

    $Cxn = mysqli_query($Servidor, $Cns);
    $Row = $Cxn->fetch_array();

    $Rta = $Servidor->query($Cns);
    $NumRows = $Rta->num_rows;
?>
    <section class="Space" data-title="true">
        <h5 class="Title SuperBig"> Menú del mes </h5>
    </section>
    <main id="Menu">
        <?php
        if (!empty($Row['NomPDF_Com']) && $NumRows != 0 && is_file('Docs/Comedor/'.$Row['NomPDF_Com'])) {
        ?>
            <input type="hidden" name="Archivo" value="<?php echo $Row['NomPDF_Com']; ?>" class="Archivo" data-element="Archivo">
            <div class="PDF">
                <embed class="PDFVisual" data-element="PDF-Visual" src="Docs/Comedor/<?php echo $Row['NomPDF_Com']; ?>" type="application/pdf">
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
        <div class="Columna">
            <h5 class="Title"> Menú del mes </h5>
            <p class="Text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut eum nemo exercitationem totam neque impedit enim
                obcaecati, delectus aspernatur distinctio itaque sint necessitatibus doloribus quasi quia sapiente amet
                officiis laboriosam?
            </p>
            <?php
            if ($RowRol['Name_Rol'] == 'Administrador' || $RowRol['Name_Rol'] == 'Cocinero' || $PK_Id_User == 1 || $PK_Id_User == 2) {
            ?>
                <form class="needs-validation MenuMes" method="POST" action="" novalidate>
                    <div class="Input" data-element="Input">
                        <input type="file" class="InputPDF" name="file[]" accept="application/pdf" data-element="Menu" required>
                        <div class="Texto">
                            <h5 class="Title Min" id="TITLE" data-element="Title"> Ingresar PDF </h5>
                            <p class="Text" id="TEXT" data-element="Text"> (Sin archivo) </p>
                        </div>
                    </div>
                    <div class="Botones" data-element="Botones">
                        <button class="Btn Guardar" name="Guardar" type="button">
                            <div class="Image">
                                <img src="Icons/Guardar.png" alt="">
                            </div>
                            <p class="Text"> Guardar </p>
                            <div class="Hitbox"></div>
                        </button>
                        <button class="Btn Eliminar" name="Eliminar" type="button">
                            <div class="Image">
                                <img src="Icons/Eliminar.png" alt="">
                            </div>
                            <p class="Text"> Eliminar </p>
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
        </div>
    </main>
    <div id="demo"></div>
<?php
}
?>