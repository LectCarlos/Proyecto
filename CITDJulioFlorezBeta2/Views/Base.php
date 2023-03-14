<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once('Public/Settings/LinkCss.php') ?>
    <title><?php
    echo $Title;
    if (strpos($Title, '¿') !== false) {
        echo '?';
    }
    ?> | C.I.T.D. Julio Florez </title>
</head>

<body id="Body">
    <div class="Container" id="Container">
        <div class="Contenedor">
            <?php
            require_once('Public/Models/Nav.php');
            require_once('Public/Models/Header.php');
            require_once('Views/' . $Vista);
            ?>
        </div>
        <?php
        require_once('Public/Models/Footer.php');
        ?>
    </div>
    <div id="Container-Avisos"></div>
    <div id="Container-Alerts"></div>
</body>
<?php require_once('Public/Settings/LinkJs.php') ?>

</html>