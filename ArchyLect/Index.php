<?php
if(!isset($_GET['Pagina'])){
    header('location: Index.php?Pagina=Inicio');
}else{
    include_once('Models/Base.php');
}
?>