<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once('Settings/LinkCss.php');
    ?>
    <title> <?php echo $_GET['Pagina'].' - ArchyLect Studios' ?> </title>
</head>

<body id="Body">
    <?php
        include_once('Models/Header.php');
        include_once('Models/Nav.php');
        include_once('Enrutador.php');
        include_once('Models/Footer.php');
    ?>
</body>
<?php
include_once('Settings/LinkJs.php');
?>

</html>