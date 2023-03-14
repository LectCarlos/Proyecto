/* ------------------------------ Open Buscador ------------------------------ */
var Buscador = document.getElementById("Buscador"),
    Expandir = document.getElementById("BtnEx"),
    Contador = 0;

function Search() {
    if (Contador == 0) {
        Buscador.classList.add("Bus");
        Contador = 1;
    } else {
        Buscador.classList.remove("Bus");
        Contador = 0;
    }
}

Expandir.addEventListener('click', Search, true);

/* ------------------------------ Busqueda1 ------------------------------ */
document.addEventListener("keyup", e => {
    if (e.target.matches("#Search")) {
        if (e.key === "Escape") e.target.value = ""
        document.querySelectorAll(".nav-item").forEach(fruta => {
            fruta.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ? fruta.classList.remove("filtro")
                : fruta.classList.add("filtro")
        })
    }
})

/* ------------------------------ Galeria ------------------------------ */
var IdGaleria = document.getElementById('Galeria');
var VisualImage = document.getElementById('VisualImage');
var Body = document.getElementById('Body');

if(IdGaleria) {
    IdGaleria.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            var Image = Btn.target.parentNode.querySelector('[data-element="Image"]');
            var Title = Btn.target.parentNode.querySelector('[data-element="Title"]');
            var VisualImg = VisualImage.querySelector('[data-element="VisualImg"]');
            var VisualTitle = VisualImage.querySelector('[data-element="VisualTitle"]');

            VisualImg.src = Image.src;
            Body.style.overflow = 'hidden';
            VisualImage.style.visibility = 'visible';
            VisualTitle.textContent = Title.textContent;
        }
    })
    
    VisualImage.addEventListener('click', (Btn) => {
        if (Btn.target.classList[0] == 'Hitbox') {
            VisualImage.style.visibility = 'hidden';
            Body.style.overflow = 'auto';
        }
    })
}