<?php
include_once('Data/Database.php');

session_start();

if(isset($_GET['XSesion'])){
    session_unset();
    session_destroy();
}

if(isset($_SESSION['Rol'])){
    switch($_SESSION['Rol']){
        case 1:
            header('location: Index.php?Pagina=Admin');
        break;
        case 2:
            header('location: Index.php?Pagina=Inicio');
        break;
        default:
    }
}

if(isset($_POST['Tx_Usuario']) && isset($_POST['Tx_Password'])){
    $Username = $_POST['Tx_Usuario'];
    $Password = $_POST['Tx_Password'];

    $Db = new Database();
    $query = $Db->connect()->prepare('SELECT*FROM cuenta WHERE Nombre_Cue = :Usuarme AND Password_Cue = :Password');
    $query->execute(['Usuarme' => $Username, 'Password' => $Password]);

    $Row = $query->fetch(PDO::FETCH_NUM);
    if($Row == true){
        $Rol = $Row[12];
        $_SESSION['Rol'] = $Rol;

        switch($_SESSION['Rol']){
            case 1:
                header('location: Index.php?Pagina=Admin');
            break;
            case 2:
                header('location: Index.php?Pagina=Inicio');
            break;
            default:
        }
    }else{
        include('Php/Login.php');
        echo "El usuario o contraseña son incorrectos";
    }
}
?>