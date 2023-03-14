<?php
if(!isset($_SESSION)) {
    session_start();
}
if(!isset($_GET['Pg'])) {
    header('location: Index.php?Pg=Inicio');
} else {
    require_once('Models/Base.php');
}