<?php

    $opcion='inicio';
    if(!isset($_GET['opcion']))
    {
        include("index.php")
    }
    else
    {
        if($_GET['opcion']=='inicioo'){
            include("index.php");
        }
        if($_GET['opcion']=='mision'){
            include("Vista/Paginas/mision.php");
        }
        if($_GET["opcion"]=="vision")
        {
            include("Vista/Paginas/vision.php");
        }
    }

?>