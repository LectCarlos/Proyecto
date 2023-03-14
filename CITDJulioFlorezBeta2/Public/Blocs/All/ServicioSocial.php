<main id="ServicioSocial">
    <div class="Cabezera">
        <div class="Two G">
            <p class="Text"><b>Estudiante:</b><?php echo $Row['Apellido_User'] . ' ' . $Row['Nombre_User'] ?></p>
            <p class="Text"><b>Curso:</b><?php echo $Row['Nom_Cur'] ?></p>
        </div>
        <div class="Two">
            <p class="Text"><b>Supervisor:</b><?php echo $Row['Sup_Ser'] ?></p>
            <p class="Text"><b>Lugar:</b><?php echo $Row['Lugar_Ser'] ?></p>
        </div>
        <div class="One G">
            <p class="Text"><b>Servicio social:</b><?php echo $Row['Nom_Ser'] ?></p>
        </div>
        <div class="Two">
            <p class="Text"><b>Fecha de inicial:</b><?php echo $Row['FecInSer_Est'] ?></p>
            <p class="Text"><b>Fecha de finalización:</b><?php echo $Row['FecFinSer_Est'] ?></p>
        </div>
    </div>
    <div class="Datos" id="IdServicioSocial">

    </div>
</main>
<section class="Space"></section>