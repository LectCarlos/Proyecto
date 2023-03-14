<header id="HeaderBi">
    <div class="Imagenes">
        <img src="../../Public/Images/Areas/Biblioteca/Biblioteca1.jpg" class="Img1" alt="">
        <img src="../../Public/Images/Areas/Biblioteca/Biblioteca2.jpeg" class="Img2" alt="">
        <img src="../../Public/Images/Areas/Biblioteca/JulioFlorez.jpg" class="JulioFlorez" alt="">
    </div>
    <div class="Info">
        <h5 class="Title SuperBig"> Julio Florez </h5>
        <p class="Text">
            Todo nos llega tarde… ¡Hasta la muerte! Nunca se satisface ni alcanza la dulce posesión de una esperanza
            cuando el deseo acósanos más fuerte. Todo puede llegar: pero se advierte que todo llega tarde: la bonanza,
            después de la tragedia: la alabanza cuando ya está la inspiración inerte.
        </p>
        <p class="Text SubText"> Colegio I.T.D. Julio Flórez | Inspirado en el poeta Julio Flórez </p>
    </div>
</header>
<section class="Space"></section>
<main id="Encargado">
    <div class="Imagen">
        <img src="../../Public/Images/Areas/Biblioteca/Cecilia.png" alt="">
    </div>
    <div class="Info">
        <h5 class="Title"> Silvia Secilia </h5>
        <p class="Text">
            Persona encargada de la administración, organización. Reconocida por su compromiso con el I.T.D. Julio
            Florez, durante años.
        </p>
    </div>
</main>
<section class="Space"></section>
<main id="Frase">
    <div class="Imagen">
        <img src="../../Public/Images/Areas/Biblioteca/Frase.png" alt="">
    </div>
    <div class="Info">
        <div class="Caja">
            <h5 class="Title">
                Meta del C.I.T.D. Julio Florez
                <br>
                Biblioteca 2022 - 2023
            </h5>
            <p class="Text">
                Expandir más la biblioteca y otorgar un mejor manejo de los libros a los estudiantes, con el fin de que
                fomenten más su creatividad e imaginación al leer.
                <br>
                <br>
                La lectura nos hace fomentar una mejor imaginación, no concentrarse en solo un punto, sino en diversos.
                Ver
                el mundo de otro modo, ver que las cosas no se consiguen, esperando, sino actuando.
            </p>
        </div>
    </div>
</main>
<?php
if (isset($_SESSION['PK_Id_User'])) {
?>
    <section class="Space" id="Visual" data-title="true">
        <h5 class="Title SuperBig"> Libros recomendados </h5>
    </section>
    <main class="VisualCards" id="Destacados">
        <div class="Visualizer">
            <article class="Card">
                <div class="Image">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib1.png" alt="">
                    <p class="Text"> Click para observar </p>
                </div>
                <div class="Info">
                    <div class="Caja">
                        <h5 class="Title Min"> Titulo libro </h5>
                        <p class="Text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid provident similique unde,
                            delectus
                            cum rem fugiat aliquam! Saepe unde et accusamus porro nobis, pariatur animi natus facilis
                            voluptates
                            eius? Aliquid!
                        </p>
                        <p class="Text">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid provident similique unde,
                            delectus
                            cum rem fugiat aliquam! Saepe unde et accusamus porro nobis, pariatur animi natus facilis
                            voluptates
                            eius? Aliquid!
                        </p>
                    </div>
                </div>
                <ul class="Datos">
                    <li class="Item">
                        <h5 class="Title Min"> Datos: </h5>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Id: </b> ------- </p>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Descargable: </b> ---- </p>
                    </li>
                    <li class="Item Autor">
                        <p class="Text"><b> Autor: </b> Autor con un nombre muy largo </p>
                    </li>
                    <li class="Item">
                        <a href="#" class="Text Link"><b> Ver más </b></a>
                    </li>
                </ul>
                <a href="#Visual" class="Hitbox"></a>
            </article>
        </div>
        <div class="Elementos">
            <article class="Card">
                <div class="Image">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib2.png" alt="">
                    <p class="Text"> Click para observar </p>
                </div>
                <div class="Info">
                    <div class="Caja">
                        <h5 class="Title Min"> Titulo libro </h5>
                        <p class="Text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nesciunt exercitationem voluptatem
                            ratione, sit rem, possimus accusamus magnam placeat obcaecati et minima expedita doloremque id
                            omnis nobis nisi eligendi quibusdam.
                        </p>
                    </div>
                </div>
                <ul class="Datos">
                    <li class="Item">
                        <h5 class="Title Min"> Datos: </h5>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Id: </b> ------- </p>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Descargable: </b> ---- </p>
                    </li>
                    <li class="Item Autor">
                        <p class="Text"><b> Autor: </b> ---------- </p>
                    </li>
                    <li class="Item">
                        <a href="#" class="Text Link"><b> Ver más </b></a>
                    </li>
                </ul>
                <a href="#Visual" class="Hitbox"></a>
            </article>
            <article class="Card">
                <div class="Image">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib3.png" alt="">
                    <p class="Text"> Click para observar </p>
                </div>
                <div class="Info">
                    <div class="Caja">
                        <h5 class="Title Min"> Titulo libro </h5>
                        <p class="Text">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt ea delectus atque incidunt
                            maiores ipsa ad aut repellat, magni, porro maxime. Ipsa illo temporibus voluptatum tenetur quo
                            aperiam cumque provident!
                        </p>
                    </div>
                </div>
                <ul class="Datos">
                    <li class="Item">
                        <h5 class="Title Min"> Datos: </h5>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Id: </b> ------- </p>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Descargable: </b> ---- </p>
                    </li>
                    <li class="Item Autor">
                        <p class="Text"><b> Autor: </b> ---------- </p>
                    </li>
                    <li class="Item">
                        <a href="#" class="Text Link"><b> Ver más </b></a>
                    </li>
                </ul>
                <a href="#Visual" class="Hitbox"></a>
            </article>
            <article class="Card">
                <div class="Image">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib4.png" alt="">
                    <p class="Text"> Click para observar </p>
                </div>
                <div class="Info">
                    <div class="Caja">
                        <h5 class="Title Min"> Titulo libro </h5>
                        <p class="Text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem illo atque ratione natus blanditiis
                            enim perferendis aut, culpa sed nesciunt consequatur quidem est non, totam, id iusto dolorum
                            recusandae quaerat.
                        </p>
                    </div>
                </div>
                <ul class="Datos">
                    <li class="Item">
                        <h5 class="Title Min"> Datos: </h5>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Id: </b> ------- </p>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Descargable: </b> ---- </p>
                    </li>
                    <li class="Item Autor">
                        <p class="Text"><b> Autor: </b> ---------- </p>
                    </li>
                    <li class="Item">
                        <a href="#" class="Text Link"><b> Ver más </b></a>
                    </li>
                </ul>
                <a href="#Visual" class="Hitbox"></a>
            </article>
            <article class="Card">
                <div class="Image">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib5.png" alt="">
                    <p class="Text"> Click para observar </p>
                </div>
                <div class="Info">
                    <div class="Caja">
                        <h5 class="Title Min"> Titulo libro </h5>
                        <p class="Text">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis ad repellat dolores deserunt
                            laudantium autem nihil sint ab? Ab voluptas ex corporis repellendus tenetur excepturi quae error
                            reprehenderit vero quibusdam.
                        </p>
                    </div>
                </div>
                <ul class="Datos">
                    <li class="Item">
                        <h5 class="Title Min"> Datos: </h5>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Id: </b> ------- </p>
                    </li>
                    <li class="Item">
                        <p class="Text"><b> Descargable: </b> ---- </p>
                    </li>
                    <li class="Item Autor">
                        <p class="Text"><b> Autor: </b> ---------- </p>
                    </li>
                    <li class="Item">
                        <a href="#" class="Text Link"><b> Ver más </b></a>
                    </li>
                </ul>
                <a href="#Visual" class="Hitbox"></a>
            </article>
        </div>
    </main>
<?php
}
?>
<section class="Space" data-title="true">
    <h5 class="Title SuperBig"> La importancia de leer </h5>
</section>
<main id="Importancia">
    <div class="Imagen1">
        <img src="../../Public/Images/Areas/Biblioteca/Estanteria.jpg" alt="">
    </div>
    <div class="Info">
        <h5 class="Title"> 1. </h5>
        <p class="Text">
            Los libros son un recurso imprescindible para su proceso formativo, les permiten imaginar, descubrir, viajar
            y conocer sobre el mundo que los rodea.
        </p>
    </div>
    <div class="Info Inf2">
        <h5 class="Title"> 2. </h5>
        <p class="Text">
            La lectura es un canal que abre paso a la adquisición del conocimiento y es, sin duda, uno de los mejores
            hábitos que se puede adquirir; sin embargo, expertos señalan que existe una enorme falta de interés.
        </p>
    </div>
    <div class="Caja">
        <div class="Imagen">
            <img src="../../Public/Images/Areas/Biblioteca/Libro.jpg" alt="">
        </div>
        <div class="Info">
            <h5 class="Title"> 3. </h5>
            <p class="Text">
                Para que las niñas y niños disfruten un libro, estos tendrían que ser digeribles, llamativos y cortos.
                Muchas veces pasa que los odian porque el vocabulario es complicado o la narrativa es compleja.
            </p>
        </div>
    </div>
</main>
<?php
if (isset($_SESSION['PK_Id_User'])) {
?>
    <section class="Space"></section>
    <main id="Libros">
        <h5 class="Title"> Un nuevo comienzo de lectura </h5>
        <p class="Text">
            Próximamente en el año 2023, se implementará la norma de que los estudiantes puedan llegar a pedir un libro
            prestado a la biblioteca, con lo cual nuestro objetivo es insitar a los jóvenes de leer, fomentar su
            imaginación.
        </p>
        <div class="MainCarousel" data-cards="6" data-auto="true" data-interval="5">
            <div class="DataCarousel">
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib1.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib2.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib3.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib4.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib5.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib6.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib7.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib8.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib9.png" alt="">
                </div>
                <div class="Carousel">
                    <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib10.png" alt="">
                </div>
            </div>
            <a href="?Pg=Libreria" class="Hitbox">
                <h5 class="Title"> Prestamo de libros </h5>
            </a>
        </div>
    </main>
<?php
}
?>
<section class="Space"></section>
<main id="Garcia">
    <div class="Autor">
        <img src="../../Public/Images/Areas/Biblioteca/GarciaMarquez.jpg" alt="">
        <div class="Caja">
            <div class="Info">
                <h5 class="Title Min"> Gabriel Garcia Marquez </h5>
                <p class="Text">
                    Gabriel José de la Concordia García Márquez fue un escritor y periodista colombiano. Reconocido
                    principalmente por sus novelas y cuentos, también escribió narrativa de no ficción, discursos,
                    reportajes, críticas cinematográficas y memorias. Fue conocido como Gabo, y familiarmente y por sus
                    amigos como Gabito. Su obra cumbre, "Cien años de soledad", se ha convertido en una referencia
                    fundamental de la lengua española, y hoy forma parte del canon de la literatura universal. Pero el Gabo
                    no solo ha sido influyente en términos estéticos, ya que su vida estuvo signada a la vez por el amor a
                    las letras y la pasión periodística.
                </p>
            </div>
        </div>
    </div>
    <div class="Libro">
        <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib11.jpg" alt="">
        <div class="Info">
            <h5 class="Title Min"> Cien años de soledad </h5>
            <p class="Text">
                De hecho, el inicio de esta saga ya es curioso: se acomodan en un “trozo de tierra” y fundan un pueblo:
                Macondo. Los hijos Aureliano y José Arcadio irán creciendo. El primero, ensimismado, callado, el segundo
                más abierto.
            </p>
        </div>
    </div>
    <div class="Libro Num2">
        <div class="Info">
            <h5 class="Title Min"> Cien años de soledad </h5>
            <p class="Text">
                De hecho, el inicio de esta saga ya es curioso: se acomodan en un “trozo de tierra” y fundan un pueblo:
                Macondo. Los hijos Aureliano y José Arcadio irán creciendo. El primero, ensimismado, callado, el segundo
                más abierto.
            </p>
        </div>
        <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib12.jpg" alt="">
    </div>
    <div class="Libro Num3">
        <img src="../../Public/Images/Areas/Biblioteca/Libros/Lib13.jpg" alt="">
        <div class="Info">
            <h5 class="Title Min"> Cien años de soledad </h5>
            <p class="Text">
                De hecho, el inicio de esta saga ya es curioso: se acomodan en un “trozo de tierra” y fundan un pueblo:
                Macondo. Los hijos Aureliano y José Arcadio irán creciendo. El primero, ensimismado, callado, el segundo
                más abierto.
            </p>
        </div>
    </div>
</main>
<section class="Space"></section>