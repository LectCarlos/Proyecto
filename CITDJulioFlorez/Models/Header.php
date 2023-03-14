<header id="Banner">
    <div class="Image">
        <img src="Images/ITDJulioFlorez.png" alt="">
    </div>
    <h5 class="Title SuperBig"><?php
    echo $_GET['Pg'];
    if (strpos($_GET['Pg'], '¿') !== false) {
        echo '?';
    }
    ?> | C.I.T.D. Julio Florez </h5>
</header>
<!--
<nav id="NavLinks">
    <div class="Tabla">
        <ul class="Lista">
            <li class="Item">
                <a href="#" class="Link">
                    <img src="Icons/EscudoJF.png" alt="" class="IconN">
                    <p class="Text"> Link </p>
                </a>
            </li>
            <li class="Item">
                <a href="#" class="Link">
                    <img src="Icons/EscudoJF.png" alt="" class="IconN">
                    <p class="Text"> Link </p>
                </a>
            </li>
            <li class="Item">
                <a href="#" class="Link">
                    <img src="Icons/EscudoJF.png" alt="" class="IconN">
                    <p class="Text"> Link </p>
                </a>
            </li>
        </ul>
    </div>
</nav>
-->