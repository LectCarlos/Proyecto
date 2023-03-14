<?php
require_once('Helper/Servidor.php');

if (isset($PK_Id_User)) {
    ?>
    <script>
        window.location = 'Index.php?Pg=Inicio';
    </script>
<?php
    exit();
}
?>

<section class="Space"></section>
<section class="Space"></section>
<main id="Formulario">
    <div class="Info">
        <div class="Caja">
            <h5 class="Title"> Colegio I.T.D. Julio Florez </h5>
            <div class="Imagen">
                <img src="Icons/Colores/EscudoJF.png" alt="">
            </div>
        </div>
    </div>
    <form class="needs-validation" id="Iniciar-Sesion" method="POST" action="" novalidate>
        <div class="Columna">
            <label for="validationCustom01" class="form-label Title Min"> Correo: </label>
            <input type="email" class="form-control Text" data-element="Email" placeholder="Ingresa tu correo aquí" autocomplete="off" required>
        </div>
        <div class="Columna">
            <label for="Password_User" class="form-label Title Min"> Contraseña: </label>
            <input type="password" class="form-control Text" data-element="Password" placeholder="Ingresa tu contraseña aquí" autocomplete="off" required>
        </div>
        <p class="Text Error" data-element="Text"></p>
        <button class="Btn" data-element="Btn-Iniciar" type="button">
            <p class="Text"> Iniciar sesión </p>
        </button>
    </form>
</main>
<div id="demo"></div>
<section class="Space"></section>
<?php
$Conexion = mysqli_connect('localhost', 'root', '', 'CITDJulioFlorez');
$Consulta = mysqli_query($Conexion, 'SELECT * FROM Usuarios');

if ($Consulta) {
    while ($Row = $Consulta->fetch_array()) {
        echo '<h5>';
        echo $Row['CorreoPer_User'], '<br>';
        echo $Row['CorreoInst_User'], '<br>';
        echo $Row['Password_User'], '<br></h5>';
    }
}

if (isset($_SESSION['PK_Id_User'])) {
    echo $_SESSION['PK_Id_User'];
}
?>
<section class="Space"></section>