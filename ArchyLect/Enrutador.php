<?php

function Lista_Directorios($Ruta)
{
    if (is_dir($Ruta)) {
        if ($Dir = opendir($Ruta)) {
            while (($File = readdir($Dir)) !== false) {
                if ($File != "." && $File != "..") {
                    $NuevaRuta = $Ruta . $File . '/';

                    if (is_dir($NuevaRuta)) {
                        Lista_Directorios($NuevaRuta);
                    } else {
                        if ($_GET['Pagina'] == 'CITDJulioFlorez') {
?>
                            <script>
                                window.location = '<?php echo "../CITDJulioFlorez/Index.php" ?>';
                            </script>
                        <?php
                        } else if ($_GET['Pagina'] == 'Chala' || $_GET['Pagina'] == 'Carlos') {
                        ?>
                            <script>
                                window.location = '<?php echo "../Folder" . $_GET['Pagina']."/Index.php" ?>';
                            </script>
                        <?php
                        } else if ($_GET['Pagina'] . '.php' == $File) {
                        ?>
                            <script>
                                if (!localStorage.getItem('Enrutador')) {
                                    localStorage.setItem('Enrutador', true);
                                } else {
                                    localStorage.setItem('Enrutador', true);
                                }
                            </script>
<?php
                            include_once($Ruta . $File);
                        }
                    }
                }
            }

            closedir($Dir);
        }
    } else {
        echo "<br>No es ruta valida";
    }
}

Lista_Directorios('Php/');
?>

<script>
    if (localStorage.getItem('Enrutador') == 'true') {
        localStorage.setItem('Enrutador', false)
    } else {
        window.location = 'Index.php?Pagina=Error';
    }
</script>