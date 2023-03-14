<?php
session_start();

if (isset($_SESSION['PK_Id_User'])) {
    $PK_Id_User = $_SESSION['PK_Id_User'];

    $Servidor = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
    $DirectorioImg = "../Images/Biblioteca/Libros/";
    $DirectorioPDF = "../Docs/Biblioteca/";

    if (isset($_FILES['ImgLib']) && isset($_FILES['PDFLib'])) {
        echo "Ambos existen al mismo tiempo";
        echo $_FILES['ImgLib']['name'].'<br>';
        echo $_FILES['PDFLib']['name'].'<br>';
    }
}
?>