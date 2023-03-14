/* ----------------------- All ----------------------- */
var EditarPerfil = document.getElementById('EditarPerfil');
var Reportar = document.getElementById('Reportar');
var Body = document.getElementById('Body');
var Container = document.getElementById('Container');
var MenuLateral = document.getElementById('NavVertical');
var Foto_User = document.getElementById('Foto_User');
var Foto_Img = document.getElementById('Foto_Img');
var Background = document.getElementById('Background');

/* ----------------------- Formularios ----------------------- */
(() => {
    'use strict'

    const forms = document.querySelectorAll('.needs-validation')

    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()

/* ----------------------- Btn Desplegable ----------------------- */
var BtnDrop = document.querySelectorAll('.BtnDrop');

BtnDrop.forEach((OnBtnDrop) => {
    for (D = 0; D < OnBtnDrop.children.length; D++) {
        if (OnBtnDrop.children[D].classList[1] == 'Seccion') {
            var Seccion = OnBtnDrop.children[D];

            for (S = 0; S < Seccion.children.length; S++) {
                if (Seccion.children[S].classList == 'Hitbox') {
                    var Hitbox = Seccion.children[S];
                }
            }
        }
    }

    Hitbox.addEventListener('click', function () {
        if (OnBtnDrop.dataset.expanded == 'true') {
            OnBtnDrop.dataset.expanded = 'false';
        } else {
            OnBtnDrop.dataset.expanded = 'true';
        }
    })
})

/* ----------------------- Menú lateral ----------------------- */
var Background = document.getElementById('Background'),
    AbrirNav = document.querySelector('.AbrirNav'),
    CerrarNav = document.querySelector('.CerrarNav'),
    Body = document.getElementById('Body');

AbrirNav.addEventListener('click', () => {
    MenuLateral.style.left = '0';
    Body.style.overflow = 'hidden';
    Background.style.visibility = 'visible';
})

CerrarNav.addEventListener('click', () => {
    MenuLateral.style.left = '-120%';
    Body.style.overflow = 'auto';
    Background.style.visibility = 'hidden';
})


/* ----------------------- Buscador ----------------------- */
document.addEventListener("keyup", e => {
    if (e.target.matches(".Search")) {
        if (e.key === "Escape") e.target.value = ""
        document.querySelectorAll(".BigItem").forEach(fruta => {
            fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ? fruta.classList.remove("Filtro")
                : fruta.classList.add("Filtro")
        })
    }
})

/* ----------------------- Noticias Quiries ----------------------- */
function Noticias() {
    var IdNoticias = document.getElementById('Noticias');

    if (IdNoticias) {
        if (window.matchMedia("(max-width: 1400px)").matches) {
            IdNoticias.dataset.cards = '3';
        }

        if (window.matchMedia("(max-width: 800px)").matches) {
            IdNoticias.dataset.cards = '2';
        }

        if (window.matchMedia("(max-width: 500px)").matches) {
            IdNoticias.dataset.cards = '1';
        }
    }
}

Noticias();

/* ----------------------- Noticias Quiries ----------------------- */
function FuncLibros() {
    var Libros = document.getElementById('Libros');

    if (Libros) {
        for (L = 0; L < Libros.children.length; L++) {
            if (Libros.children[L].classList[0] == 'MainCarousel') {
                var Main = Libros.children[L];

                if (window.matchMedia("(max-width: 900px)").matches) {
                    Main.dataset.cards = '5';
                }

                if (window.matchMedia("(max-width: 700px)").matches) {
                    Main.dataset.cards = '4';
                }

                if (window.matchMedia("(max-width: 400px)").matches) {
                    Main.dataset.cards = '3';
                }
            }
        }
    }
}

FuncLibros();

/* ----------------------- Carousel ----------------------- */
var MainCarousel = document.querySelectorAll('.MainCarousel');

MainCarousel.forEach((OnMainCarousel) => {
    let Act = 0;
    let Cards = OnMainCarousel.dataset.cards

    if (OnMainCarousel.dataset.interval) {
        var Time = OnMainCarousel.dataset.interval * 1000;
    } else {
        var Time = 5000;
    }

    for (M = 0; M < OnMainCarousel.children.length; M++) {
        if (OnMainCarousel.children[M].className == 'DataCarousel') {
            var DataCarousel = OnMainCarousel.children[M];
            var ListaCantidad = [];

            for (Cc = 0; Cc < DataCarousel.children.length; Cc++) {
                if (DataCarousel.children[Cc].classList == 'Carousel') {
                    ListaCantidad[Cc] = Cc
                }
            }
        }

        if (OnMainCarousel.children[M].classList == 'Botones') {
            var Botones = OnMainCarousel.children[M];

            for (B = 0; B < Botones.children.length; B++) {
                if (Botones.children[B].classList == 'CarouselLeft') {
                    var CarouselLeft = Botones.children[B];
                }

                if (Botones.children[B].classList == 'CarouselRight') {
                    var CarouselRight = Botones.children[B];
                }
            }
        }

        if (OnMainCarousel.children[M].classList == 'Slider') {
            var Slider = OnMainCarousel.children[M];
        }
    }

    if (CarouselRight) {
        CarouselRight.addEventListener('click', () => {
            for (i = 0; i < ListaCantidad.length; i++) {
                if (ListaCantidad[i] == ListaCantidad.length - 1) {
                    ListaCantidad[i] = 0;
                } else {
                    ListaCantidad[i] = ListaCantidad[i] + 1;
                }
            }

            Organizado();
        })
    }

    if (CarouselLeft) {
        CarouselLeft.addEventListener('click', () => {
            for (i = 0; i < ListaCantidad.length; i++) {
                if (ListaCantidad[i] == 0) {
                    ListaCantidad[i] = ListaCantidad.length - 1;
                } else {
                    ListaCantidad[i] = ListaCantidad[i] - 1;
                }
            }

            Organizado();
        })
    }

    if (Slider) {
        Slider.addEventListener('click', (Btn) => {
            for (S = 0; S < Slider.children.length; S++) {
                if (Slider.children[S] == Btn.target) {
                    while (true) {
                        if (ListaCantidad[0] != S) {
                            for (i = 0; i < ListaCantidad.length; i++) {
                                if (ListaCantidad[i] == ListaCantidad.length - 1) {
                                    ListaCantidad[i] = 0;
                                } else {
                                    ListaCantidad[i] = ListaCantidad[i] + 1;
                                }
                            }
                        } else {
                            break;
                        }
                    }

                    Organizado();
                }
            }
        })
    }

    if (Cards) {
        for (i = 0; i < DataCarousel.children.length; i++) {
            DataCarousel.children[i].style.width = (100 / Cards) + '%';
        }
    } else {
        for (i = 0; i < DataCarousel.children.length; i++) {
            DataCarousel.children[i].style.width = '100%';
        }
    }

    function Organizado() {
        let PosP = 0;

        if (Cards) {
            var Suma = 100 / Cards;
        } else {
            var Suma = 100;
        }

        for (D = 0; D < ListaCantidad.length; D++) {
            if (D == Act) {
                if (Slider) {
                    Slider.children[ListaCantidad[D]].style.opacity = '1';
                    Slider.children[ListaCantidad[D]].style.transform = 'scale(1.1)';
                }

                if (OnMainCarousel.dataset.display == 'true' & (!Cards || Cards == 0 || Cards == 1)) {
                    DataCarousel.children[ListaCantidad[D]].style.display = 'block';
                } else {
                    DataCarousel.children[ListaCantidad[D]].style.left = PosP + '%';
                }
            } else if (D > Act) {
                PosP = PosP + Suma;

                if (Slider) {
                    Slider.children[ListaCantidad[D]].style.opacity = '.5';
                    Slider.children[ListaCantidad[D]].style.transform = 'scale(1)';
                }

                if (OnMainCarousel.dataset.display == 'true' & (!Cards || Cards == 0 || Cards == 1)) {
                    DataCarousel.children[ListaCantidad[D]].style.display = 'none';
                } else {
                    DataCarousel.children[ListaCantidad[D]].style.left = PosP + '%';
                }
            }
        }
    }

    setInterval(function () {
        if (OnMainCarousel.dataset.auto == "true") {
            for (i = 0; i < ListaCantidad.length; i++) {
                if (ListaCantidad[i] == ListaCantidad.length - 1) {
                    ListaCantidad[i] = 0;
                } else {
                    ListaCantidad[i] = ListaCantidad[i] + 1;
                }
            }

            Organizado();
        }
    }, Time)

    Organizado();
})

/* ----------------------- Ubicacion ----------------------- */
var Mapa = document.getElementById('Ubicacion');

if (Mapa) {
    for (M = 0; M < Mapa.children.length; M++) {
        if (Mapa.children[M].classList == 'MapaImg') {
            var Img = Mapa.children[M]
        }

        if (Mapa.children[M].classList == 'Frame') {
            var Frame = Mapa.children[M]
        }
    }

    if (navigator.onLine) {
        Frame.style.display = 'grid';
        Img.style.display = 'none';
    } else {
        Frame.style.display = 'none';
        Img.style.display = 'grid';
    }
}

/* ----------------------- Accordion ----------------------- */
var IdAccordion = document.querySelectorAll('.Accordion');

IdAccordion.forEach(Accordion => {
    Cont = 0;

    if (Accordion.dataset.oneslider == "true" || Accordion.dataset.activeslider == "true") {
        for (A = 0; A < Accordion.children.length; A++) {
            if (Accordion.children[A].classList[1] == 'Open') {
                Cont++;
            }
        }

        if (Cont == 0) {
            for (A = 0; A < Accordion.children.length; A++) {
                if (Accordion.children[A].classList[0] == 'Slider') {
                    Accordion.children[0].classList.add('Open');
                }
            }
        }
    }

    Accordion.addEventListener('click', (Btn) => {
        for (A = 0; A < Accordion.children.length; A++) {
            if (Accordion.children[A].classList[0] == 'Slider') {
                Slider = Accordion.children[A];

                for (S = 0; S < Slider.children.length; S++) {
                    if (Slider.children[S].classList == 'Encabezado') {
                        Encabezado = Slider.children[S];

                        for (E = 0; E < Encabezado.children.length; E++) {
                            if (Encabezado.children[E].classList == 'Hitbox') {
                                Hitbox = Encabezado.children[E];
                            }
                        }

                        if (Accordion.dataset.oneslider == "true") {
                            if (Hitbox.tagName == Btn.target.tagName) {
                                if (Slider.classList[1] == 'Open') {
                                    Slider.classList.remove('Open');
                                }
                            }
                        }

                        if (Hitbox.classList == Btn.target.classList) {
                            Slider.classList.toggle('Open');
                        }
                    }
                }
            }
        }
    })
})

/* ----------------------- DivisorColumnas ----------------------- */
var IdDivisorColumnas = document.querySelectorAll('.DivisorColumnas');

IdDivisorColumnas.forEach(DivisorColumnas => {
    for (D = 0; D < DivisorColumnas.children.length; D++) {
        if (DivisorColumnas.children[D].classList[0] == 'Proyectos') {
            var Proyectos = DivisorColumnas.children[D];
        }

        if (DivisorColumnas.children[D].classList[0] == 'BtnProyectos') {
            var BtnProyectos = DivisorColumnas.children[D];
        }
    }

    BtnProyectos.addEventListener('click', (Btn) => {
        if (Btn.target.tagName == 'BUTTON') {
            Btn.target.style.transform = 'scale(1.1)';
            Proyectos.style.gridTemplateColumns = 'repeat(' + Btn.target.textContent + ', auto)';
        }
    })
})

/* ----------------------- VisualCards ----------------------- */
var IdVisualCards = document.querySelectorAll('.VisualCards');

IdVisualCards.forEach(VisualCards => {
    var Fragment = document.createDocumentFragment();

    for (V = 0; V < VisualCards.children.length; V++) {
        if (VisualCards.children[V].classList[0] == 'Elementos') {
            var Elementos = VisualCards.children[V];
        }
    }

    Elementos.addEventListener('click', (Element) => {
        if (Element.target.classList[0] == 'Hitbox') {
            for (V = 0; V < VisualCards.children.length; V++) {
                if (VisualCards.children[V].classList[0] == 'Visualizer') {
                    var Visualizer = VisualCards.children[V];

                    for (C = 0; C < Visualizer.children.length; C++) {
                        if (Visualizer.children[C].classList[0] == 'Card') {
                            var Card = Visualizer.children[C];

                            Fragment.appendChild(Card);
                            Elementos.appendChild(Fragment);
                        }
                    }
                }
            }
        }

        if (Element.target.classList[0] == 'Hitbox') {
            Fragment.appendChild(Element.target.parentNode);
            Visualizer.appendChild(Fragment);
        }
    })
})

/* ----------------------- Notificaciones ----------------------- */


if (Reportar) {
    Reportar.addEventListener('click', (BtnReport) => {
        if (BtnReport.target.classList[1] == 'C') {
            Reportar.style.top = '-50%';
            Body.style.overflow = 'auto';
            Background.style.visibility = 'hidden';
            Reportar.classList.remove('was-validated');

            for (R = 0; R < Reportar.children.length; R++) {
                if (Reportar.children[R].classList[0] == 'Columna') {
                    var Columna = Reportar.children[R];

                    for (C = 0; C < Columna.children.length; C++) {
                        if (Columna.children[C].classList[0] == 'form-select') {
                            var FromSelect = Columna.children[C];

                            for (I = 0; I < FromSelect.children.length; I++) {
                                FromSelect.children[I].selected = FromSelect.children[I].defaultSelected;
                            }
                        }

                        if (Columna.children[C].classList[0] == 'form-check-input') {
                            var FromCheck = Columna.children[C];

                            FromCheck.checked = false;
                        }

                        if (Columna.children[C].classList[0] == 'form-control') {
                            var FromControl = Columna.children[C];

                            FromControl.value = "";
                        }
                    }
                }
            }
        }
    })
}

/* ----------------------- Background ----------------------- */
Background.addEventListener('click', () => {
    MenuLateral.style.left = '-120%';
    Body.style.overflow = 'auto';
    Background.style.visibility = 'hidden';

    if (EditarPerfil) {
        EditarPerfil.style.top = '-50%';
        // Foto_Img.src = 'Images/Usuarios/FotosPerfil/' + Foto_User.value;
    }

    if (Reportar) {
        Reportar.style.top = '-50%';
        Reportar.classList.remove('was-validated');

        for (R = 0; R < Reportar.children.length; R++) {
            if (Reportar.children[R].classList[0] == 'Columna') {
                var Columna = Reportar.children[R];

                for (C = 0; C < Columna.children.length; C++) {
                    if (Columna.children[C].classList[0] == 'form-select') {
                        var FromSelect = Columna.children[C];

                        for (I = 0; I < FromSelect.children.length; I++) {
                            FromSelect.children[I].selected = FromSelect.children[I].defaultSelected;
                        }
                    }

                    if (Columna.children[C].classList[0] == 'form-check-input') {
                        var FromCheck = Columna.children[C];

                        FromCheck.checked = false;
                    }

                    if (Columna.children[C].classList[0] == 'form-control') {
                        var FromControl = Columna.children[C];

                        FromControl.value = "";
                    }
                }
            }
        }
    }

    if (IdPublicar) {
        IdPublicar.style.top = '-100%';
    }
})

/* ----------------------- Cursos Id----------------------- */
var IdCursos = document.getElementById('Cursos');

if (IdCursos) {
    IdCursos.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var Curso = Btn.target.parentNode.querySelector('[data-element="Curso"]');

            window.location = 'Index.php?Pg=Estudiantes&&Cur=' + Curso.value;
        }
    })
}

/* ----------------------- Estudiantes ----------------------- 
var IdEstudiantes = document.getElementById('Estudiantes');

if (IdEstudiantes) {
    IdEstudiantes.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var Nom_Cur = Btn.target.parentNode.querySelector('[data-element="Nom_Cur"]')
            var IdEst_Est = Btn.target.parentNode.querySelector('[data-element="IdEst_Est"]')
            var PK_Id_Est = Btn.target.parentNode.querySelector('[data-element="PK_Id_Est"]')

            var Parametros = {
                "PK_Id_Est": PK_Id_Est.value,
            }

            $.ajax({
                data: Parametros,
                url: "Ajax/Variables.php",
                type: "POST",

                success: function (MostrarMensaje) {
                    $('#demo').html(MostrarMensaje);
                    window.location = 'Index.php?Pg=Servicio social&&IdCur=' + Nom_Cur.value + '&&IdEst=' + IdEst_Est.value;
                }
            })
        }
    })
}

/* ----------------------- IdServicioSocial ----------------------- */


/* ----------------------- Libros ----------------------- */
var IdLibreria = document.getElementById('Libreria');

if (IdLibreria) {
    IdLibreria.addEventListener('click', (Libro) => {
        if (Libro.target.classList[0] == 'Hitbox') {
            var Boton = Libro.target.parentNode

            for (B = 0; B < Boton.children.length; B++) {
                if (Boton.children[B].classList[0] == 'InfoOculta') {
                    var Input = Boton.children[B];

                    var Parametros = {
                        'PK_Id_Lib': Input.value
                    }

                    $.ajax({
                        data: Parametros,
                        url: 'Ajax/Variables.php',
                        type: 'POST',

                        success: function (MostrarMensaje) {
                            $('#demo').html(MostrarMensaje);
                        }
                    })
                }
            }
        }
    })
}

/* ----------------------- Reseñas ----------------------- */
var IdResenas = document.getElementById('Resenas');

if (IdResenas) {
    function TimeNow() {
        var Tabla = $.ajax({
            url: 'Ajax/Biblioteca/Resenas.php',
            dataType: 'text',
            async: false
        }).responseText;

        IdResenas.innerHTML = Tabla;

        var IdResena = document.querySelectorAll('.Resena');

        IdResena.forEach(Resena => {
            for (N = 0; N < Resena.children.length; N++) {
                if (Resena.children[N].classList[0] == 'Tabla') {
                    var Tabla = Resena.children[N];

                    for (T = 0; T < Tabla.children.length; T++) {
                        if (Tabla.children[T].classList[0] == 'Text') {
                            var Text = Tabla.children[T];
                        }
                    }
                }

                if (Resena.children[N].classList[0] == 'Id_Notf') {
                    var IdNotf = Resena.children[N].value;
                }
            }

            for (R = 0; R < Reportar.children.length; R++) {
                if (Reportar.children[R].classList[1] == 'Acusado') {
                    var Columna = Reportar.children[R];

                    for (C = 0; C < Columna.children.length; C++) {
                        if (Columna.children[C].classList[0] == 'form-control') {
                            var FormControl = Columna.children[C];
                        }
                    }
                }
            }

            Resena.addEventListener('click', (Report) => {
                if (Report.target.classList[0] == 'HitboxR') {
                    Report.preventDefault();
                    Reportar.style.top = '50%';
                    Body.style.overflow = 'hidden';
                    Background.style.visibility = 'visible';
                    FormControl.value = Text.textContent;
                }
            })

            Reportar.addEventListener('click', (BtnReport) => {
                if (BtnReport.target.classList[1] == 'C') {
                    Reportar.style.top = '-50%';
                    Body.style.overflow = 'auto';
                    Background.style.visibility = 'hidden';
                    Reportar.classList.remove('was-validated');

                    for (R = 0; R < Reportar.children.length; R++) {
                        if (Reportar.children[R].classList[0] == 'Columna') {
                            var Columna = Reportar.children[R];

                            for (C = 0; C < Columna.children.length; C++) {
                                if (Columna.children[C].classList[0] == 'form-select') {
                                    var FromSelect = Columna.children[C];

                                    for (I = 0; I < FromSelect.children.length; I++) {
                                        FromSelect.children[I].selected = FromSelect.children[I].defaultSelected;
                                    }
                                }

                                if (Columna.children[C].classList[0] == 'form-check-input') {
                                    var FromCheck = Columna.children[C];

                                    FromCheck.checked = false;
                                }

                                if (Columna.children[C].classList[0] == 'form-control') {
                                    var FromControl = Columna.children[C];

                                    FromControl.value = "";
                                }
                            }
                        }
                    }
                }
            })
        })
    }

    TimeNow();

    setInterval(TimeNow, 2000);
}

/* ----------------------- Corazones ----------------------- */
var IdBtnCora = document.getElementById('BtnCora');

if (IdBtnCora) {
    IdBtnCora.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var Resena = Btn.target.parentNode;

            for (R = 0; R < Resena.children.length; R++) {
                if (Resena.children[R].classList[0] == 'ValCora') {
                    var ValCora = Resena.children[R];
                }

                if (Resena.children[R].classList[0] == 'CantCora') {
                    var CantCora = Resena.children[R];
                }

                if (Resena.children[R].classList[0] == 'Text') {
                    var Text = Resena.children[R];
                }

                if (Resena.children[R].classList[0] == 'Image') {
                    var CoraImg = Resena.children[R].children[0];
                }
            }
        }

        if (ValCora.value == 1) {
            ValCora.value--;
            CantCora.value--;
            CoraImg.src = 'Icons/Corazon.png';
            Text.textContent = CantCora.value;
            Corazon();
        } else {
            ValCora.value++;
            CantCora.value++;
            CoraImg.src = 'Icons/Colores/CorazonColor.png';
            Text.textContent = CantCora.value;
            Corazon();
        }

        function Corazon() {
            var Parametros = {
                'CantCora': CantCora.value,
                'ValCora': ValCora.value
            }

            $.ajax({
                data: Parametros,
                url: 'Ajax/CantCora.php',
                type: 'POST',

                success: function (MostrarMensaje) {
                    $('#demo').html(MostrarMensaje);
                }
            })
        }
    })
}

/* ----------------------- AddLib ----------------------- */
var IdAddLib = document.getElementById('AddLib');

if (IdAddLib) {
    var ImgLib = IdAddLib.querySelector('[data-element="ImgLib"]');
    var ImgTitle = IdAddLib.querySelector('[data-element="ImgTitle"]');
    var ImgText = IdAddLib.querySelector('[data-element="ImgText"]');
    var ImgInput = IdAddLib.querySelector('[data-element="ImgInput"]');

    var PDFLib = IdAddLib.querySelector('[data-element="PDFLib"]');
    var PDFTitle = IdAddLib.querySelector('[data-element="PDFTitle"]');
    var PDFText = IdAddLib.querySelector('[data-element="PDFText"]');
    var PDFInput = IdAddLib.querySelector('[data-element="PDFInput"]');

    var EpiLib = IdAddLib.querySelector('[data-element="EpiLib"]');
    var PagLib = IdAddLib.querySelector('[data-element="PagLib"]');
    var AutLib = IdAddLib.querySelector('[data-element="AutLib"]');
    var NomLib = IdAddLib.querySelector('[data-element="NomLib"]');

    function Default(Title, Input, Text, Lib) {
        Lib.value = '';
        Text.textContent = '(Sin archivo)';
        Title.textContent = 'Ingresar portada';
        Input.style.borderColor = "rgb(110, 110, 110)";
        Input.style.backgroundColor = "rgb(110, 110, 110, .4)";
    }

    function Valid(Title, Input, Text, Lib) {
        Title.textContent = '¡Archivo ingresado!';
        Input.style.borderColor = "rgb(0, 110, 0)";
        Input.style.backgroundColor = "rgb(0, 110, 0, .4)";
        Text.textContent = '(' + Lib.files[0].name + ')';
    }

    function InValid(Title, Input, Text, Valor) {
        Title.textContent = '¡No olvides ingresar ' + Valor + '!';

        setTimeout(function () {
            Title.textContent = 'Ingresar ' + Valor;
        }, 4000)

        Text.textContent = '(Sin archivo)';
        Input.style.borderColor = "rgb(200, 0, 0)";
        Input.style.backgroundColor = "rgb(220, 0, 0, .4)";
    }

    ImgLib.addEventListener('change', () => {
        if (!ImgLib.files || !ImgLib.files.length) {
            Default(ImgTitle, ImgInput, ImgText, ImgLib);
            return;
        }

        Valid(ImgTitle, ImgInput, ImgText, ImgLib);
    })

    PDFLib.addEventListener('change', () => {
        if (!PDFLib.files || !PDFLib.files.length) {
            Default(PDFTitle, PDFInput, PDFText, PDFLib);
            return;
        }

        Valid(PDFTitle, PDFInput, PDFText, PDFLib);
    })

    // IdAddLib.addEventListener('submit', (Event) => {
    //     if (!IdAddLib.checkValidity()) {
    //         if (ImgLib.value == '') {
    //             InValid(ImgTitle, ImgInput, ImgText, 'portada');
    //         }
    //         if (PDFLib.value == '') {
    //             InValid(PDFTitle, PDFInput, PDFText, 'PDF');
    //         }

    //         Event.preventDefault();
    //         Event.stopPropagation();
    //     } else {
    //         var FormImg = new FormData(ImgLib);
    //         var FormPDF = new FormData(PDFLib);

    //         $.ajax({
    //             data: FormImg, FormPDF,
    //             url: "Ajax/AddLibs.php",
    //             type: "POST",
    //             contentType: false,
    //             processData: false,

    //             success: function (MostrarMensaje) {
    //                 $('#demo').html(MostrarMensaje);
    //             }
    //         })
    //     }
    // })

    IdAddLib.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            if (Btn.target.parentNode.classList[1] == 'Guardar') {
                if (!IdAddLib.checkValidity()) {
                    if (ImgLib.value == '') {
                        InValid(ImgTitle, ImgInput, ImgText, 'portada');
                    }
                    if (PDFLib.value == '') {
                        InValid(PDFTitle, PDFInput, PDFText, 'PDF');
                    }
                } else {
                    var FormImg = new FormData;
                    FormImg.append('ImgLib', ImgLib.files[0])

                    var FormPDF = new FormData;
                    FormPDF.append('PDFLib', PDFLib.files[0])

                    $.ajax({
                        data: FormImg,
                        url: "Ajax/AddLibs.php",
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,

                        success: function (MostrarMensaje) {
                            $('#demo').html(MostrarMensaje);
                        }
                    })
                }
            }
        }
    })
}

/* ----------------------- AddResena ----------------------- */
var IdAddResena = document.getElementById('AddResena');

if (IdAddResena) {
    var TextArea = IdAddResena.querySelector('[data-element="TextArea"]');

    IdAddResena.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            if (Btn.target.parentNode.classList[1] == 'Publicar') {
                if (!IdAddResena.checkValidity()) {
                    if (TextArea.value == '') {
                        return;
                    }
                }


                var Parametros = {
                    'TextArea': TextArea.value,
                    'Validar': 1,
                }

                $.ajax({
                    data: Parametros,
                    url: "Ajax/AddResena.php",
                    type: "POST",

                    success: function (MostrarMensaje) {
                        $('#demo').html(MostrarMensaje);
                    }
                })

                TextArea.value = '';
            }

            if (Btn.target.parentNode.classList[1] == 'Cancelar') {
                TextArea.value = '';
            }
        }
    })
}








/*
var Tags = ["@Todos", "@Administradores", "@Biblioteca", "@Comedor",
        "@Orientación", "@Profesores", "@Estudiantes", "@Once", "@Décimo",
        "@Noveno", "@Octavo", "@Septimo", "@Sexto", "@1104", "@1103", "@1102",
        "@1101", "@1004", "@1003", "@1002", "@1001", "@904", "@903", "@902",
        "@901", "@803", "@802", "@801", "@703", "@702", "@701", "@603",
        "@602", "@601"];

    var InputTag = Publicar.querySelector('[data-element="Input-Tag"]');
    var ContainerTag = Publicar.querySelector('[data-element="Container-Tag"]');
    var BtnTags = Publicar.querySelector('[data-element="Btn-Tags"]');

    InputTag.addEventListener("keyup", function (e) {
        var Tag = InputTag.value;

        if (Tag != '' && Tag.indexOf(' ') == -1) {
            FilterTags();
        } else {
            BtnTags.innerHTML = "";
        }

        if (e.keyCode == 13 && Tag != '' && Tag != '@' && Tag.indexOf(' ') == -1) {
            AddTag (Tag);
        }
    })

    ContainerTag.addEventListener("click", function (e) {
        if (e.target.tagName == "BUTTON") {
            var li = e.target.parentElement;
            li.parentElement.removeChild(li);
        }
    })

    BtnTags.addEventListener("click", function (e) {
        if (e.target.tagName == "LI") {
            var Tag = e.target.innerText;

            AddTag (Tag);
        }
    })

    function AddTag (Tag) {
        if (!TagExists(Tag)) {
            ContainerTag.innerHTML += '<li class="Tag Text"><span data-element="Span-Tag">' + Tag + '</span><button type="button" class="Delete">X</button></li>';

            InputTag.value = "";
            BtnTags.innerHTML = "";
        } else {
            InputTag.value = "";
            BtnTags.innerHTML = "";
            InputTag.setAttribute("placeholder", "¡Ya está ingresado!");

            setTimeout(function () {
                InputTag.setAttribute("placeholder", "Para: (@ o Correo personal)");
            }, 2000)
        }
    }

    function FilterTags() {
        var value = InputTag.value.toLowerCase();
        BtnTags.innerHTML = "";

        for (var i = 0; i < Tags.length; i++) {
            if (Tags[i].toLowerCase().indexOf(value) != -1) {
                BtnTags.innerHTML += '<li class="Text Tag">' + Tags[i] + '</li>';
            }
        }
    }
    
    function TagExists(Tag) {
        var ExistingTags = Publicar.querySelectorAll('[data-element="Span-Tag"]');
        
        for (i = 0; i < ExistingTags.length; i++) {
            var ExistingTag = ExistingTags[i].innerText;
            if (ExistingTag == Tag) {
                return true;
            }
        }

        return false;
    }

















// Obtener todos los tags existentes
var existingTags = document.querySelectorAll("#tags span");

// Función para comprobar si un tag existe
function tagExists(tag) {
    // Recorrer los tags existentes
    for (var i = 0; i < existingTags.length; i++) {
        // Obtener el tag
        var existingTag = existingTags[i].innerText;
        // Si el tag existe
        if (existingTag == tag) {
            // Retornar verdadero
            return true;
        }
    }

    // Retornar falso
    return false;
}

// Agregar el evento de clic a la lista de tags
list.addEventListener("click", function(e) {
    // Si el elemento clickeado es un elemento de lista
    if (e.target.tagName == "LI") {
        // Obtener el valor del elemento de lista
        var tag = e.target.innerText;
        // Si el tag no existe
        if (!tagExists(tag)) {
            // Agregar el tag al div de tags
            tagsDiv.innerHTML += "<li><span>" + tag + "</span><a href='#'>x</a></li>";
        }
        // Limpiar el input
        input.value = "";
        // Ocultar la lista
        list.innerHTML = "";
    }
});
*/



/*
function loadDoc() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        document.getElementById("demo").innerHTML = 'Hola mundo';
    }

    xht    $(document).ready(function () {

var config = {
    url: '../../aplicacion/crud/index.php',
    variables: 'tabla'
};
var fuentedata = sendData(config);
 function  sendData(config)
 {//json captura
 var json = null;
 $.ajax({
    'type': "POST",
    'data': config,
    'async': false,
    'global': false,
    'url': '' + config.url,
    'dataType': "json"
    , 'beforeSend': function (data)
    {
       // console.log('... cargando...');
    }
    , 'error': function (data) {
        //si hay un error mostramos un mensaje
        console.log('Tenemos problemas Houston ' + data);
    },
    'success': function (data) {
        json = data;
    }
    });
    return json;
}

});tp.open("GET", "", true);
    xhttp.send();
}
*/





/*
function javascript_to_php() {
    var jsVar1 = "Hello";
    var jsVar2 = "World";
    window.location.href = window.location.href + "?w1=" + jsVar1 + "&w2=" + jsVar2;
    $.ajax(
        'Index.php?Pg=Perfil', {
            success: function(data) {
                alert('AJAX call was successful!');
                alert('Data from the server' + data);
            },
            error: function() {
                alert('There was some error performing the AJAX call!');
            }
        }
    );
}
*/

// function Nombre() {
//     var Parametros = {
//         "Var1": "Mensaje 1",
//         "Var2": "Mensaje 2",
//         "Var3": "Mensaje 3"
//     };

//     $.ajax({
//         data: Parametros,
//         url: "Ajax/FotoPerfil.php",
//         type: "POST",

//         beforesend: function () {
//             $('#demo').html("Mensaje antes de enviar");
//         },

//         success: function (MostrarMensaje) {
//             $('#demo').html(MostrarMensaje);
//         }
//     })
// }

/*
/ Create a new FormData object
var formData = new FormData();

// Add the files to the formData object
formData.append('file1', fileInputElement1.files[0]);
formData.append('file2', fileInputElement2.files[0]);

// Add the variables to the formData object
formData.append('variable1', 'value1');
formData.append('variable2', 'value2');
formData.append('variable3', 'value3');

// Send the FormData object in the AJAX request
$.ajax({
  url: '/upload',
  type: 'POST',
  data: formData,
  processData: false,
  contentType: false
});

*/

/* ============================ Principal ============================ */
/* ----------------------- Background ----------------------- */
function FuncBack(Elemento) {
    if (Elemento.style.top == '-150%') {
        Elemento.style.top = '50%';
        Body.style.overflow = 'hidden';
        Background.style.visibility = 'visible';
    } else {
        Body.style.overflow = 'auto';
        Elemento.style.top = '-150%';
        Background.style.visibility = 'hidden';
    }
}

/* ----------------------- Aviso ----------------------- */
function FuncAviso(Titulo, Mensaje) {
    $('#Container-Avisos').html(`
    <article id="Aviso" style="top: -150%">
        <h5 class="Title Min">• `+ Titulo + `</h5>
        <p class="Text Msj">`+ Mensaje + `</p>
        <div class="Botones">
            <button class="Text Ok">OK</button>
            <button class="Text Cancelar">Cancelar</button>
        </div>
    </article>
    `);
}

/* ----------------------- Alertas ----------------------- */
function FuncAlert(Titulo, Mensaje, Val) {
    IdAlerts = document.querySelectorAll('#Alert');

    for (A = 0; A < IdAlerts.length; A++) {
        if (IdAlerts[A].dataset.type == Val) {
            BarA = IdAlerts[A].querySelector('.Bar');
            BarA.style.width = '100%';
            return;
        }
    }

    $('#Container-Alerts').append(`
        <article id="Alert" data-type="`+ Val + `">
            <div class="Head">
                <div class="Icono">
                    <img src="Icons/Colores/`+ Val + `Color.png" class="Icono">
                </div>
                <h5 class="Title Min">`+ Titulo + `</h5>
            </div>
            <p class="Text Msj">`+ Mensaje + `</p>
            <div class="Bar" style="width: 100%"></div>
        </article>
    `);
}

setInterval(() => {
    IdAlerts = document.querySelectorAll('#Alert');

    IdAlerts.forEach(Alert => {
        Bar = Alert.querySelector('.Bar');

        if (parseInt(Bar.style.width) <= 0) {
            Alert.remove();
            clearInterval();
        } else {
            Bar.style.width = (parseInt(Bar.style.width) - 5) + '%';
        }
    })
}, 500);

/* ----------------------- Input Files ----------------------- */
function FileDefault(Input, Title, Text, Name) {
    Title.style.color = "rgb(50, 50, 50)";
    Text.style.color = "rgb(50, 50, 50)";
    Text.textContent = '(Sin ' + Name + ')';
    Title.textContent = 'Ingresar ' + Name;
    Input.style.borderColor = "rgb(110, 110, 110)";
    Input.style.backgroundColor = "rgb(110, 110, 110, .4)";
}

function FileValid(Value, Input, Title, Text, Name) {
    Title.style.color = "rgb(0, 100, 0)";
    Text.style.color = "rgb(0, 100, 0)";
    Input.style.borderColor = "rgb(0, 100, 0)";
    Title.textContent = '¡' + Name + ' ingresado!';
    Input.style.backgroundColor = "rgb(0, 180, 0, .4)";
    Text.textContent = '(' + Value.files[0].name + ')';
}

function FileInValid(Input, Title, Text, Name) {
    Title.style.color = "rgb(160, 0, 0)";
    Text.style.color = "rgb(160, 0, 0)";
    Text.textContent = '(Sin ' + Name + ')';
    Title.textContent = '¡Falta ' + Name + '!';
    Input.style.borderColor = "rgb(160, 0, 0)";
    Input.style.backgroundColor = "rgb(220, 0, 0, .4)";

    setTimeout(function () {
        FileDefault(Input, Title, Text, Name);
        Title.textContent = 'Ingresar ' + Name;
    }, 4000)
}

/* ============================ Perfil ============================ */
/* ----------------------- IdPerfil Foto ----------------------- */
var IdPerfil = document.getElementById('Perfil');
var IdEditarPerfil = document.getElementById('EditarPerfil');

if (IdPerfil) {
    Img = IdEditarPerfil.querySelector('[data-element="Img"]');
    Title = IdEditarPerfil.querySelector('[data-element="Title"]');
    Text = IdEditarPerfil.querySelector('[data-element="Text"]');
    Botones = IdEditarPerfil.querySelector('[data-element="Botones"]');
    EditImg = IdEditarPerfil.querySelector('[data-element="Edit-Img"]');
    OrigImg = IdEditarPerfil.querySelector('[data-element="Orig-Img"]');
    InputFoto = IdEditarPerfil.querySelector('[data-element="Input-Img"]')
    BtnEditImg = IdPerfil.querySelector('[data-element="Btn-Edit-Img"]');

    BtnEditImg.addEventListener('click', () => {
        FuncBack(IdEditarPerfil);
    })

    InputFoto.addEventListener("change", () => {
        if (!InputFoto.files || !InputFoto.files.length) {
            return;
        }

        setTimeout(function () {
            if (Img.naturalWidth >= Img.naturalHeight) {
                Img.dataset.size = 'Height';
            } else {
                Img.dataset.size = 'Width';
            }
        }, 100)

        Img.src = URL.createObjectURL(InputFoto.files[0]);
    })

    Botones.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            formData = new FormData();
            POST = false;

            if (Btn.target.parentNode.classList[1] != 'Cancelar') {
                if (Btn.target.parentNode.classList[1] == 'Guardar') {
                    if (!InputFoto.files || !InputFoto.files.length || Img.src == 'http://localhost/CITDJulioFlorez/Images/Usuarios/FotosPerfil/SinFoto.png') {
                        return;
                    }

                    POST = true;
                    formData.append('Foto', InputFoto.files[0]);
                    formData.append('Type', 'Guardar');
                }

                if (Btn.target.parentNode.classList[1] == 'Eliminar') {
                    if (OrigImg.value == 'SinFoto.png') {
                        return;
                    }

                    POST = true;
                    formData.append('Type', 'Eliminar');
                }

                if (POST == true) {
                    formData.append('Orig', OrigImg.value);

                    $.ajax({
                        type: 'POST',
                        url: "Ajax/Perfil/FotoPerfil.php",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function (MostrarMensaje) {
                            $('#demo').html(MostrarMensaje);
                        }
                    })
                }
            } else {
                InputFoto.value = '';
                FuncBack(IdEditarPerfil);
                Img.src = 'Images/Usuarios/FotosPerfil/' + OrigImg.value;
            }
        }
    })
}

/* ----------------------- Notificacion ----------------------- */
var IdNotificaciones = document.getElementById('IdNotificaciones');

if (IdNotificaciones) {
    function TimeNow() {
        var Tabla = $.ajax({
            url: 'Ajax/Perfil/Notificaciones.php',
            dataType: 'text',
            async: false
        }).responseText;

        IdNotificaciones.innerHTML = Tabla;

        var IdNotificacion = IdNotificaciones.querySelectorAll('.Notificacion');

        IdNotificacion.forEach(Notificacion => {
            Notificacion.addEventListener('click', (Btn) => {
                if (Btn.target.classList[0] == 'Hitbox') {
                    IdUN = Notificacion.querySelector('[data-element="Id-UN"]');
                    IdNotf = Notificacion.querySelector('[data-element="Id-Notf"]');

                    if (Btn.target.parentNode.classList[0] == 'Like') {
                        Text = Notificacion.querySelector('[data-element="Text"]');
                        LikeLN = Notificacion.querySelector('[data-element="Like-LN"]');
                        LikeImg = Notificacion.querySelector('[data-element="Like-Img"]');
                        LikeNotf = Notificacion.querySelector('[data-element="Like-Notf"]');

                        if (LikeLN.value == 1) {
                            LikeImg.src = 'Icons/Gris/LikeGris.png';
                            TextVal = parseInt(Text.textContent) - 1;
                            LikeNotf.value--;
                            LikeLN.value--;
                            Text.textContent = TextVal;

                            ValLike = {
                                "Like_LN": 0
                            }
                        } else {
                            LikeImg.src = 'Icons/Colores/LikeColor.png';
                            TextVal = parseInt(Text.textContent) + 1;
                            LikeNotf.value++;
                            LikeLN.value++;
                            Text.textContent = TextVal;

                            ValLike = {
                                "Like_LN": 1
                            }
                        }

                        Parametros = {
                            "Id_Notf": IdNotf.value,
                            "Likes_Notf": LikeNotf.value
                        }

                        Parametros = { ...Parametros, ...ValLike };

                        $.ajax({
                            data: Parametros,
                            url: "Ajax/Perfil/Like.php",
                            type: "POST",

                            success: function (MostrarMensaje) {
                                $('#demo').html(MostrarMensaje);
                            }
                        })
                    }

                    if (Btn.target.parentNode.classList[0] == 'Reportar') {
                        Reportar = document.getElementById('Reportar');
                        FormUser = Reportar.querySelector('[data-element="Form-User"]');
                        NomUser = Notificacion.querySelector('[data-element="Nom-User"]');

                        FuncBack(Reportar);
                        FormUser.value = NomUser.value;
                    }

                    if (Btn.target.parentNode.classList[0] == 'Eliminar') {
                        console.log('Hello, word!');
                        Titulo = "¿Seguro quieres eliminar esta notificación?";
                        Mensaje = "¡La publicación será eliminado permanentemente!";

                        FuncAviso(Titulo, Mensaje);

                        IdAvisos = document.querySelectorAll('#Aviso');

                        IdAvisos.forEach(Aviso => {
                            FuncBack(Aviso);

                            Aviso.addEventListener('click', (Btn) => {
                                if (Btn.target.tagName == 'BUTTON') {
                                    if (Btn.target.classList[1] == 'Ok') {
                                        Titulo = 'Éxito';
                                        Texto = '¡La publicación ha sido eliminada correctamente!';

                                        FuncAlert(Titulo, Texto, 'Success');
                                    }

                                    FuncBack(Aviso);
                                    $(Btn.target).closest('#Aviso').remove();
                                }
                            })
                        })
                    }
                }
            })

            Tags = Notificacion.querySelector('[data-element="Tags"]');

            if (Tags) {
                AllTag = Notificacion.querySelectorAll('.Tag');
                ParaCount = Notificacion.querySelector('[data-element="Para-Count"]');
                WidthTag = 0;

                for (I = 0; I < AllTag.length; I++) {
                    TagWidth = window.getComputedStyle(AllTag[I]).width;
                    WidthTag += parseFloat(TagWidth.replace('px', ''));
                }

                ContWidth = window.getComputedStyle(Tags).width;

                if (WidthTag >= parseFloat(ContWidth.replace('px', ''))) {
                    ParaCount.innerHTML = '<span>(x' + AllTag.length + ')</span>';
                }
            }
        })
    }

    TimeNow();

    setInterval(TimeNow, 2000);
}

/* ----------------------- Publicar ----------------------- */
var IdPublicar = document.getElementById('Publicar');
var BtnFormPublicar = document.querySelector('[data-element="Btn-Form-Publicar"]');

if (IdPublicar) {
    BtnFormPublicar.addEventListener('click', () => {
        FuncBack(IdPublicar);
    })

    /* ------------------- Imagenes ------------------- */
    InputImg = IdPublicar.querySelector('[data-element="Input-Img"]');
    GaleriaImg = IdPublicar.querySelector('[data-element="Galeria-Img"]');
    GaleriaFotos = IdPublicar.querySelector('[data-element="Galeria-Fotos"]');
    MostrarMenos = IdPublicar.querySelector('[data-element="Mostrar-Menos"]');

    InputImg.addEventListener("change", () => {
        for (A = 0; A < InputImg.files.length; A++) {
            ObjectURL = URL.createObjectURL(InputImg.files[A]);

            GaleriaImg.innerHTML += `
                <div class="Imagen Text" data-element="Img" data-size="">
                    <img src="`+ ObjectURL + `" data-element="Div-Img">
                    <div class="Box-Shadow" data-element="Box-Shadow"></div>
                </div>
            `;
        }

        InputImg.value = '';
        MaxCount();

        setTimeout(function () {
            AllChildImg = GaleriaImg.querySelectorAll('[data-element="Div-Img"]');

            AllChildImg.forEach(ChildImg => {
                if (ChildImg.naturalWidth >= ChildImg.naturalHeight) {
                    ChildImg.parentNode.dataset.size = 'Height';
                } else {
                    ChildImg.parentNode.dataset.size = 'Width';
                }
            })
        }, 200)
    })

    GaleriaFotos.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox' || Btn.target.tagName == MostrarMenos.tagName) {
            GaleriaFotos.classList.toggle('Max-Count');
        } else {
            if (Btn.target.dataset.element == 'Box-Shadow') {
                Btn.target.parentNode.remove();
            }
        }

        MaxCount();
    })


    function MaxCount() {
        GaleriaFotos = IdPublicar.querySelector('[data-element="Galeria-Fotos"]');
        ChildThree = GaleriaImg.querySelector(':nth-child(3)');
        ChildFour = GaleriaImg.querySelector(':nth-child(4)');
        ChildFive = GaleriaImg.querySelector(':nth-child(5)');

        if (ChildFour) {
            BtnCount = ChildFour.querySelector('[data-element="Btn-Count"]');
        }

        if (BtnCount) {
            TextCount = BtnCount.querySelector('[data-element="Text-Count"]');
            TextCount.innerText = '+' + (GaleriaImg.children.length - 4);
        }

        if (ChildThree) {
            CountThree = ChildThree.querySelector('[data-element="Btn-Count"]');

            if (CountThree) {
                CountThree.remove();
            }
        }

        if (GaleriaFotos.classList[1] == 'Max-Count') {
            for (G = 4; G < GaleriaImg.children.length; G++) {
                GaleriaImg.children[G].style.removeProperty('display');
            }

            if (BtnCount) {
                BtnCount.remove();
            }

            if (!ChildFive) {
                GaleriaFotos.classList.remove('Max-Count');
            }
        } else {
            if (GaleriaImg.children[3]) {
                GaleriaImg.children[3].style.removeProperty('display');
            }

            for (G = 4; G < GaleriaImg.children.length; G++) {
                GaleriaImg.children[G].style.display = 'none';
            }

            if (ChildFive) {
                if (!BtnCount) {
                    ChildFour.innerHTML += `
                        <button type="button" class="Btn-Count" data-element="Btn-Count">
                            <p class="Text" data-element="Text-Count">+`+ (GaleriaImg.children.length - 4) + `</p>
                            <div class="Hitbox"></div>
                        </button>
                    `
                }
            } else {
                if (BtnCount) {
                    BtnCount.remove();
                }
            }
        }
    }

    /* ------------------- Etiquetas ------------------- */
    AddTag = IdPublicar.querySelector('[data-element="Add-Tag"]');
    ContainerTags = IdPublicar.querySelector('[data-element="Container-Tags"]');
    BtnTags = IdPublicar.querySelector('[data-element="Btn-Tags"]');
    Resultados(AddTag.value);

    AddTag.addEventListener("keyup", function (Tecla) {
        Tag = AddTag.value;
        Resultados(AddTag.value);

        if (Tecla.keyCode == 13 && Tag != '' && Tag != '@' && Tag.indexOf(' ') == -1) {
            InputTag(Tag);
        }
    })

    ContainerTags.addEventListener("click", function (Btn) {
        if (Btn.target.tagName == "BUTTON") {
            Item = Btn.target.parentElement;
            Item.parentElement.removeChild(Item);
            Active();
        }
    })

    BtnTags.addEventListener("click", function (Btn) {
        if (Btn.target.tagName == "LI") {
            Tag = Btn.target.innerText;
            InputTag(Tag);
        }
    })

    function InputTag(Tag) {
        if (!TagExists(Tag)) {
            ContainerTags.innerHTML += `
                                                        <li class="Tag Text">
                                                            <span data-element="Span-Tag">`+ Tag + `</span>
                                                            <button type="button" class="Delete">X</button>
                                                        </li>
                                                        `;

            AddTag.value = ""
            Resultados(AddTag.value);
        } else {
            AddTag.value = ""
            Resultados(AddTag.value);
            AddTag.setAttribute("placeholder", "¡Ya está ingresado!");

            setTimeout(function () {
                AddTag.setAttribute("placeholder", "Para: (@ o Correo personal)");
            }, 2000)
        }
    }

    function TagExists(Tag) {
        ExistingTags = IdPublicar.querySelectorAll('[data-element="Span-Tag"]');

        for (i = 0; i < ExistingTags.length; i++) {
            ExistingTag = ExistingTags[i].innerText;
            if (ExistingTag == Tag) {
                return true;
            }
        }

        return false;
    }

    function Resultados(Busqueda) {
        Parametros = {
            'Busqueda': Busqueda
        }

        $.ajax({
            data: Parametros,
            url: 'Ajax/Perfil/AddTags.php',
            type: 'POST',

            success: function (MostrarMensaje) {
                $('#Resultados').html(MostrarMensaje);
                Active();
            }
        })
    }

    function Active() {
        ExistingTags = IdPublicar.querySelectorAll('[data-element="Span-Tag"]');
        ValueTags = IdPublicar.querySelectorAll('[data-element="Item-Tag"]');

        for (All = 0; All < ValueTags.length; All++) {
            ValueTags[All].style.backgroundColor = 'rgba(0, 0, 0, 0)';
        }

        for (I = 0; I < ValueTags.length; I++) {
            for (I2 = 0; I2 < ExistingTags.length; I2++) {
                if (ValueTags[I].innerText == ExistingTags[I2].innerText) {
                    ValueTags[I].style.backgroundColor = 'rgb(92, 255, 220)';
                }
            }
        }
    }

    /* ------------------- Botones ------------------- */
    Lateral = IdPublicar.querySelector('[data-element="Menu-Lateral"]');
    Secciones = IdPublicar.querySelector('[data-element="Secciones"]');
    Contenido = IdPublicar.querySelector('[data-element="Contenido"]');
    Fragment = document.createDocumentFragment();

    Lateral.addEventListener('click', (Btn) => {
        if (Btn.target.tagName == 'IMG') {
            if (Btn.target.dataset.element == 'Important') {
                if (Btn.target.dataset.important == 'false') {
                    Btn.target.dataset.important = 'true';
                } else {
                    Btn.target.dataset.important = 'false';
                }
            } else if (Contenido.children[0].dataset.element != Btn.target.dataset.ubicacion) {
                NewCard = Secciones.querySelector('[data-element="' + Btn.target.dataset.ubicacion + '"]');

                Fragment.appendChild(Contenido.children[0]);
                Secciones.appendChild(Fragment);

                Fragment.appendChild(NewCard);
                Contenido.appendChild(Fragment);
            }
        }
    })

    /* ------------------- Cerrar ------------------- */
    Cerrar = IdPublicar.querySelector('[data-element="Cerrar"]');

    Cerrar.addEventListener('click', () => {
        IdPublicar.style.top = '-100%';
        Body.style.overflow = 'auto';
        Background.style.visibility = 'hidden';
    })
}

/* ============================ Administración ============================ */
/* ----------------------- Cargos ----------------------- */
var IdBtnCargos = document.getElementById('BtnCargos');

if (IdBtnCargos) {
    IdBtnCargos.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var Cargo = Btn.target.parentNode.querySelector('[data-element="Cargo"]');
            var AllHitbox = IdBtnCargos.querySelectorAll('.Hitbox');

            for (H = 0; H < AllHitbox.length; H++) {
                AllHitbox[H].style.backgroundColor = 'rgba(0, 0, 0, 0)';
            }

            Btn.target.style.backgroundColor = 'rgba(0, 130, 0, .3)';

            var Parametros = {
                'Cargo': Btn.target.parentNode.classList[1],
                'FK_Rol_User': Cargo.value
            }

            $.ajax({
                data: Parametros,
                url: "Ajax/Areas/Administrador/Cargos.php",
                type: "POST",

                success: function (MostrarMensaje) {
                    $('#PartAddUser').html(MostrarMensaje);
                    FuncFormCargo();
                }
            })
        }
    })

    function FuncFormCargo() {
        FormCargo = document.getElementById('AddUser');

        if (FormCargo) {
            FormCargo.addEventListener('click', (Btn) => {
                if (Btn.target.classList[0] == 'Hitbox') {
                    if (Btn.target.parentNode.classList[1] == 'Agregar') {
                        NombreUser = FormCargo.querySelector('[data-element="Nombre_User"]');
                        ApellidoUser = FormCargo.querySelector('[data-element="Apellido_User"]');
                        EdadUser = FormCargo.querySelector('[data-element="Edad_User"]');
                        CorreoPerUser = FormCargo.querySelector('[data-element="CorreoPer_User"]');
                        CorreoInstUser = FormCargo.querySelector('[data-element="CorreoInst_User"]');
                        CelUser = FormCargo.querySelector('[data-element="Cel_User"]');
                        IdentUser = FormCargo.querySelector('[data-element="Ident_User"]');
                        PasswordUser = FormCargo.querySelector('[data-element="Password_User"]');
                        NomCur = FormCargo.querySelector('[data-element="Nom_Cur"]');
                        RolUser = FormCargo.querySelector('[data-element="Rol_User"]');

                        Parametros = {
                            'NombreUser': NombreUser.value,
                            'ApellidoUser': ApellidoUser.value,
                            'EdadUser': EdadUser.value,
                            'CorreoPerUser': CorreoPerUser.value,
                            'CorreoInstUser': CorreoInstUser.value,
                            'CelUser': CelUser.value,
                            'IdentUser': IdentUser.value,
                            'PasswordUser': PasswordUser.value,
                            'RolUser': RolUser.value,
                        }

                        if (NomCur) {
                            ValCur = {
                                'NomCur': NomCur.value
                            }

                            Parametros = { ...Parametros, ...ValCur };
                        }

                        if (FormCargo.checkValidity()) {
                            $.ajax({
                                data: Parametros,
                                url: "Ajax/Areas/Administrador/AddUsers.php",
                                type: 'POST',

                                success: function (MostrarMensaje) {
                                    $('#PartAddUser').html(MostrarMensaje);
                                }
                            })
                        }
                    }
                }
            })
        }
    }
}

/* ----------------------- Tabla ----------------------- */
var IdTablaUsers = document.getElementById('Tabla-Usuarios');

if (IdTablaUsers) {
    IdTablaUsers.addEventListener('click', (Btn) => {
        for (T = 0; T < IdBtnCargos.children.length; T++) {
            if (IdBtnCargos.children[T].children[2].classList[0] == 'Hitbox') {
                Hitbox = IdBtnCargos.children[T].children[2];

                Hitbox.style.backgroundColor = 'rgba(0, 0, 0, 0)';
            }
        }

        if (Btn.target.classList[0] == 'Hitbox') {
            PK_Id_User = Btn.target.parentNode.parentNode.querySelector('[data-element="PK_Id_User"]');
            FK_Rol_User = Btn.target.parentNode.parentNode.querySelector('[data-element="FK_Rol_User"]');

            Parametros = {
                'IdUser': PK_Id_User.value,
                'RolUser': FK_Rol_User.value,
                'Type': Btn.target.parentNode.classList[1]
            }

            $.ajax({
                data: Parametros,
                url: "Ajax/Areas/Administrador/Cargos.php",
                type: 'POST',

                success: function (MostrarMensaje) {
                    $('#PartListUser').html(MostrarMensaje);
                }
            })
        }
    })
}

/* ============================ Comedor ============================ */
/* ----------------------- Menu ----------------------- */
var IdMenu = document.getElementById('Menu');

if (IdMenu) {
    var Botones = IdMenu.querySelector('[data-element="Botones"]');
    var Archivo = IdMenu.querySelector('[data-element="Archivo"]');
    var Input = IdMenu.querySelector('[data-element="Input"]');
    var Menu = IdMenu.querySelector('[data-element="Menu"]');
    var Title = IdMenu.querySelector('[data-element="Title"]');
    var Text = IdMenu.querySelector('[data-element="Text"]');

    Menu.addEventListener('change', () => {
        if (!Menu.files || !Menu.files.length) {
            Menu.value = '';
            FileDefault(Input, Title, Text, 'PDF');
            return;
        }

        FileValid(Menu, Input, Title, Text, 'PDF');
    })

    Botones.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var formData = new FormData();
            POST = false;

            if (Btn.target.parentNode.classList[1] != 'Cancelar') {
                if (Btn.target.parentNode.classList[1] == 'Guardar') {
                    if (!Menu.files || !Menu.files.length) {
                        FileInValid(Input, Title, Text, 'PDF');
                        return;
                    }

                    POST = true;
                    formData.append('Menu', Menu.files[0]);
                    formData.append('Type', 'Guardar');
                }

                if (Btn.target.parentNode.classList[1] == 'Eliminar') {
                    if (!Archivo) {
                        return;
                    }

                    POST = true;
                    formData.append('Type', 'Eliminar');
                }

                if (POST == true) {
                    if (Archivo) {
                        formData.append('Orig', Archivo.value);
                    }

                    $.ajax({
                        type: 'POST',
                        url: "Ajax/Comedor/AddMenu.php",
                        data: formData,
                        contentType: false,
                        processData: false,

                        success: function (MostrarMensaje) {
                            $('#demo').html(MostrarMensaje);
                        }
                    })
                }
            } else {
                Menu.value = '';
                FileDefault(Input, Title, Text, 'PDF');
            }
        }
    })
}

/* ============================ Orientación ============================ */
/* ----------------------- IdServicioSocial ----------------------- */
var IdServicioSocial = document.getElementById('ServicioSocial');

if (IdServicioSocial) {
    queryString = window.location.search;
    IdEst = new URLSearchParams(queryString).get('IdEst');
    IdCur = new URLSearchParams(queryString).get('IdCur');

    Parametros = {
        'PK_Id_Est': IdEst,
        'Nom_Cur': IdCur
    }

    $.ajax({
        data: Parametros,
        url: 'Ajax/Orientacion/HorasSociales.php',
        type: 'POST',

        success: function (MostrarMensaje) {
            $('#ServicioSocial').html(MostrarMensaje);

            TableHoursFunc();
        }
    })

    function TableHoursFunc() {
        IdTableHours = document.getElementById('TableHours');
        AddServicioSocial = document.getElementById('AddServicioSocial');

        if (IdTableHours) {
            IdTableHours.addEventListener('click', (Btn) => {
                if (Btn.target.classList[0] == 'Hitbox') {
                    PK_Id_Est = Btn.target.parentNode.parentNode.querySelector('[data-element="PK_Id_Est"]');
                    PK_Id_Ser = Btn.target.parentNode.parentNode.querySelector('[data-element="PK_Id_Ser"]');
                    Hours = Btn.target.parentNode.parentNode.querySelector('[data-element="Hours"]');
                    Minutes = Btn.target.parentNode.parentNode.querySelector('[data-element="Minutes"]');

                    if (!PK_Id_Est) {
                        PK_Id_Est = 0;
                    } else {
                        PK_Id_Est = PK_Id_Est.value;
                    }

                    if (!PK_Id_Ser) {
                        PK_Id_Ser = 0;
                    } else {
                        PK_Id_Ser = PK_Id_Ser.value;
                    }

                    if (!Hours && !Minutes) {
                        Hours = 0;
                        Minutes = 0;
                    } else {
                        Hours = Hours.value;
                        Minutes = Minutes.value;
                    }

                    Parametros = {
                        'Hours': Hours,
                        'Minutes': Minutes,
                        'PK_Id_Est': PK_Id_Est,
                        'PK_Id_Ser': PK_Id_Ser,
                        'Type': Btn.target.parentNode.classList[1]
                    }

                    $.ajax({
                        data: Parametros,
                        url: 'Ajax/Orientacion/MoreHours.php',
                        type: 'POST',

                        success: function (MostrarMensaje) {
                            $('#PartMoreHours').html(MostrarMensaje);
                            MoreHoursFunc();
                        }
                    })
                }
            })
        }

        if (AddServicioSocial) {
            AddServicioSocial.addEventListener('click', (Btn) => {
                if (Btn.target.classList[0] == 'Hitbox') {
                    if (Btn.target.parentNode.classList[1] == 'Guardar') {
                        Sup_Ser = AddServicioSocial.querySelector('[data-element="Sup_Ser"]');
                        Lugar_Ser = AddServicioSocial.querySelector('[data-element="Lugar_Ser"]');
                        Nom_Ser = AddServicioSocial.querySelector('[data-element="Nom_Ser"]');
                        FecInSer_Est = AddServicioSocial.querySelector('[data-element="FecInSer_Est"]');
                        PK_Id_Est = AddServicioSocial.querySelector('[data-element="PK_Id_Est"]');

                        Parametros = {
                            'Sup_Ser': Sup_Ser.value,
                            'Lugar_Ser': Lugar_Ser.value,
                            'Nom_Ser': Nom_Ser.value,
                            'FecInSer_Est': FecInSer_Est.value,
                            'PK_Id_Est': PK_Id_Est.value,
                            'Type': 'AgregarServicio',
                        }

                        if (AddServicioSocial.checkValidity()) {
                            $.ajax({
                                data: Parametros,
                                url: 'Ajax/Orientacion/HoursMod.php',
                                type: 'POST',

                                success: function (MostrarMensaje) {
                                    $('#PartMoreHours').html(MostrarMensaje);
                                }
                            })
                        }
                    }
                }
            })
        }
    }

    function MoreHoursFunc() {
        IdMoreHours = document.getElementById('MoreHours');

        if (IdMoreHours) {
            IdMoreHours.addEventListener('click', (Btn) => {
                if (Btn.target.classList[0] == 'Hitbox') {
                    if (Btn.target.parentNode.classList[1] != 'Cancelar') {
                        if (Btn.target.parentNode.classList[1] != 'Verificar') {
                            PK_Id_Ser = IdMoreHours.querySelector('[data-element="PK_Id_Ser"]');
                            Day_Ser = IdMoreHours.querySelector('[data-element="Day_Ser"]');
                            Job_Ser = IdMoreHours.querySelector('[data-element="Job_Ser"]');
                            Firm_Ser = IdMoreHours.querySelector('[data-element="Firm_Ser"]');

                            Validar(IdMoreHours);

                            if (!PK_Id_Ser) {
                                PK_Id_Ser = 0;
                            } else {
                                PK_Id_Ser = PK_Id_Ser.value;
                            }
                        }

                        PK_Id_Est = IdMoreHours.querySelector('[data-element="PK_Id_Est"]');

                        if (Btn.target.parentNode.classList[1] != 'Verificar') {
                            Parametros = {
                                'Day_Ser': Day_Ser.value,
                                'HrEn_Ser': HrEn_Ser.value,
                                'HrSa_Ser': HrSa_Ser.value,
                                'Job_Ser': Job_Ser.value,
                                'Firm_Ser': Firm_Ser.value,
                                'Hours': Hours.value,
                                'Minutes': Minutes.value,
                                'PK_Id_Est': PK_Id_Est.value,
                                'PK_Id_Ser': PK_Id_Ser,
                                'Type': Btn.target.parentNode.classList[1]
                            }
                        } else {
                            Parametros = {
                                'PK_Id_Est': PK_Id_Est.value,
                                'Type': Btn.target.parentNode.classList[1]
                            }
                        }

                        if (IdMoreHours.checkValidity()) {
                            $.ajax({
                                data: Parametros,
                                url: 'Ajax/Orientacion/HoursMod.php',
                                type: 'POST',

                                success: function (MostrarMensaje) {
                                    $('#demo').html(MostrarMensaje);
                                }
                            })
                        }
                    } else {
                        $('#PartMoreHours').html('');
                    }
                }
            })

            IdMoreHours.addEventListener('change', () => {
                Validar(IdMoreHours);
            })
            IdMoreHours.addEventListener('keyup', () => {
                Validar(IdMoreHours);
            })

            function Validar(IdMoreHours) {
                HrEn_Ser = IdMoreHours.querySelector('[data-element="HrEn_Ser"]');
                HrSa_Ser = IdMoreHours.querySelector('[data-element="HrSa_Ser"]');
                Hours = IdMoreHours.querySelector('[data-element="Hours"]');
                Minutes = IdMoreHours.querySelector('[data-element="Minutes"]');

                if ((HrEn_Ser.value != '' && HrSa_Ser.value == '') || (HrSa_Ser.value != '' && HrEn_Ser.value == '')) {
                    HrSa_Ser.setAttribute("required", "");
                    HrEn_Ser.setAttribute("required", "");
                } else if ((HrEn_Ser.value == '' && HrSa_Ser.value == '') || (HrEn_Ser.value != '' && HrSa_Ser.value != '')) {
                    HrEn_Ser.removeAttribute("required");
                    HrSa_Ser.removeAttribute("required");
                }

                if (Hours.value != '' && Hours.value != 0 && (Minutes.value == '' || Minutes.value == 0)) {
                    Hours.setAttribute("required", "");
                    Hours.min = 1;
                    Minutes.min = 0;
                    Minutes.dataset.notvalide = "true";
                    Minutes.removeAttribute("required");
                } else if (Hours.value == '' && Minutes.value != '') {
                    Hours.min = 0;
                    Minutes.min = 1;
                    Minutes.dataset.notvalide = "false";
                    Hours.removeAttribute("required");
                    Minutes.setAttribute("required", "");
                } else if (Hours.value == 0 && (Minutes.value == 0 || Minutes.value == '')) {
                    Hours.min = 1;
                    Minutes.min = 1;
                    Hours.setAttribute("required", "");
                    Minutes.dataset.notvalide = "false";
                    Minutes.setAttribute("required", "");
                } else if (Hours.value == '' && Minutes.value == '') {
                    Hours.min = 0;
                    Minutes.min = 1;
                    Minutes.dataset.notvalide = "false";
                    Minutes.setAttribute("required", "");
                }
            }
        }
    }
}

/* ============================ Iniciar sesión ============================ */
/* ----------------------- Validacion ----------------------- */
var IdIniciarSesion = document.getElementById('Iniciar-Sesion');

if (IdIniciarSesion) {
    BtnIniciar = IdIniciarSesion.querySelector('[data-element="Btn-Iniciar"]');

    BtnIniciar.addEventListener('click', () => {
        Text = IdIniciarSesion.querySelector('[data-element="Text"]');
        Email = IdIniciarSesion.querySelector('[data-element="Email"]');
        Password = IdIniciarSesion.querySelector('[data-element="Password"]');

        Parametros = {
            'Email': Email.value,
            'Password': Password.value
        }

        if (Email.value != '' && Email.value != ' ' && Password.value != '' && Password.value != ' ') {
            $.ajax({
                data: Parametros,
                url: 'Ajax/Iniciar/Validacion.php',
                type: 'POST',

                success: function (AJAX) {
                    var Validar = JSON.parse(AJAX);

                    if (Validar == true) {
                        window.location = "Index.php?Pg=Inicio";
                    } else {
                        Titulo = 'Error';
                        Texto = 'El Correo y/o contraseña han sido incorrectos';
                        FuncAlert(Titulo, Texto, 'Error');
                    }
                }
            })
        }
    })
}

/* ============================ Validaciones ============================ */
setInterval(() => {
    Forms = document.querySelectorAll('.Need-Validation');

    if (Forms) {
        Forms.forEach(Form => {
            Form.addEventListener('click', (BtnForm) => {
                Parent = BtnForm.target.parentNode.classList[1];

                if (Parent == 'Agregar' || Parent == 'Guardar' || Parent == 'Eliminar' || Parent == 'Editar') {
                    if (!Form.checkValidity()) {
                        Validated(true);
                        BtnForm.preventDefault();
                        BtnForm.stopPropagation();
                    }

                    Form.classList.add('Was-Validated');
                }
            })

            Form.addEventListener('change', Validated(false));
            Form.addEventListener('keydown', Validated(false));

            function Validated(Event) {
                if (Form.className.match('Was-Validated') || Event == true) {
                    IdInput = Form.querySelectorAll('input');
                    IdSelect = Form.querySelectorAll('select');

                    IdInput.forEach(Input => {
                        if (Input.parentNode.dataset.disabled != 'true' && Input.dataset.notvalide != 'true') {
                            if (Input.hasAttribute("required")) {
                                if (Input.checkValidity()) {
                                    Input.parentNode.dataset.validation = 'true';
                                } else {
                                    Input.parentNode.dataset.validation = 'false';
                                }
                            } else {
                                Input.parentNode.dataset.validation = 'true';
                            }
                        }
                    })

                    IdSelect.forEach(Input => {
                        if (Input.parentNode.dataset.disabled != 'true' && Input.dataset.notvalide != 'true') {
                            if (Input.hasAttribute("required")) {
                                if (Input.checkValidity()) {
                                    Input.parentNode.dataset.validation = 'true';
                                } else {
                                    Input.parentNode.dataset.validation = 'false';
                                }
                            } else {
                                Input.parentNode.dataset.validation = 'true';
                            }
                        }
                    })
                }
            }
        })
    }
}, 500)