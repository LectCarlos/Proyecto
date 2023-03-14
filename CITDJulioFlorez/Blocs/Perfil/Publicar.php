<article class="Publicacion" id="Publicar">
    <div class="Informacion">
        <article class="Info" data-element="Info">
            <div class="Perfil">
                <div class="Imagen">
                    <img src="Images/Usuarios/FotosPerfil/<?php echo $Row['IdImg_User'] ?>" class="Perfil" onerror="this.src='Images/Usuarios/FotosPerfil/SinFoto.png'" alt="">
                </div>
                <p class="Text"><?php echo $Row['Nombre_User'] ?></p>
                <button type="button" class="Btn-Cerrar" data-element="Cerrar">
                    <img src="Icons/Cerrar.png" alt="">
                </button>
            </div>
            <ul class="Contenedor-Tags" data-element="Container-Tags">
            </ul>
        </article>
        <div class="Contenido" data-element="Contenido">
            <article class="Comentario" data-element="Comentario">
                <textarea class="Input Text" data-element="Input-Cms" placeholder="¿Qué quieres mensionar el día de hoy?" autocomplete="off"></textarea>
            </article>
        </div>
        <div class="Galeria-Fotos" data-element="Galeria-Fotos">
            <div class="Galeria" data-element="Galeria-Img">
            </div>
            <button type="button" data-element="Mostrar-Menos" class="Mostrar-Menos Text"> Mostrar menos </button>
        </div>
        <button class="Btn-Publicar">
            <p class="Text"> Publicar </p>
            <div class="Hitbox"></div>
        </button>
        <div class="Secciones" data-element="Secciones">
            <article class="Imagenes" data-element="Imagenes">
                <input type="file" class="Input-Img" data-element="Input-Img" multiple>
                <div class="Texto">
                    <h5 class="Title Min">Ingresar imagenes</h5>
                    <p class="Text">(Sin imagenes)</p>
                </div>
            </article>
            <article class="Etiquetas" data-element="Etiquetas">
                <div class="Input-Tag">
                    <input type="text" class="Add-Tag Text" data-element="Add-Tag">
                    <img src="Icons/Gris/LupaGris.png" alt="">
                </div>
                <ul class="Resultados" id="Resultados" data-element="Btn-Tags">
                </ul>
            </article>
            <article class="Estado" data-element="Estado">

            </article>
        </div>
    </div>
    <aside class="Menu-Lateral" data-element="Menu-Lateral">
        <img src="Icons/Colores/MensajeColor.png" data-ubicacion="Comentario">
        <img src="Icons/Colores/ImagenColor.png" data-ubicacion="Imagenes">
        <img src="Icons/Colores/EstadoColor.png" data-ubicacion="Estado">
        <img src="Icons/Colores/EtiquetarColor.png" data-ubicacion="Etiquetas">
        <img src="Icons/Colores/ImportantColor.png" data-element="Important" data-important="false">
    </aside>
</article>