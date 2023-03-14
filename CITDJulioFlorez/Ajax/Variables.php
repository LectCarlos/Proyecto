<?php
session_start();

if (isset($_POST['Curso'])) {
    $_SESSION['Curso'] = $_POST['Curso'];
}

if (isset($_POST['PK_Id_Est'])) {
    $_SESSION['PK_Id_Est'] = $_POST['PK_Id_Est'];
}

if (isset($_POST['PK_Id_Lib'])) {
    $_SESSION['PK_Id_Lib'] = $_POST['PK_Id_Lib'];

?>
    <script>
        window.location = 'Index.php?Pg=Libro';
    </script>
<?php
}
?>