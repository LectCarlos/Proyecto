<form class="needs-validation EditarPerfil" id="EditarPerfil" method="POST" action="" novalidate>
    <div class="Caja">
        <div class="EditImg" data-element="Edit-Img">
            <img class="Img" data-element="Img" data-size="" src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" id="Foto_Img" alt="">
        </div>
        <h5 class="Title Min" data-element="Title">Sin Imagen</h5>
        <p class="Text" data-element="Text">(Sin Imagen)</p>
        <input type="file" class="Hitbox" data-element="Input-Img" accept="image/jpg, image/jpeg">
    </div>
    <div class="Botones" data-element="Botones">
        <button class="Btn Guardar" name="Guardar" type="button">
            <div class="Image">
                <img src="Icons/Guardar.png" alt="">
            </div>
            <p class="Text"> Guardar </p>
            <div class="Hitbox"></div>
        </button>
        <button class="Btn Eliminar" name="Eliminar" type="button">
            <div class="Image">
                <img src="Icons/Eliminar.png" alt="">
            </div>
            <p class="Text"> Eliminar </p>
            <div class="Hitbox"></div>
        </button>
        <button class="Btn Cancelar" name="Cancelar" type="button">
            <div class="Image">
                <img src="Icons/Cerrar.png" alt="">
            </div>
            <p class="Text"> Cancelar </p>
            <div class="Hitbox"></div>
        </button>
        <input type="hidden" data-element="Orig-Img" value="<?php echo $Row['IdImg_User'] ?>" class="Foto_User" disabled>
    </div>
</form>