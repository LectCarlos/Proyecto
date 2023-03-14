<form class="needs-validation Report" id="Reportar" method="POST" action="" novalidate>
    <h5 class="Title"> Reportar problema </h5>
    <div class="Columna Acusado">
        <label for="validationCustom01" class="form-label Title Min"> Acusado: </label>
        <input type="text" data-element="Form-User" class="form-control Text" autocomplete="off" disabled>
    </div>
    <div class="Columna">
        <label for="validationCustom04" class="form-label Title Min"> Tipo de problema: </label>
        <select class="form-select Text" id="validationCustom04" required>
            <option selected value=""> Reportar problema </option>
            <option> Desnudos </option>
            <option> Violencia </option>
            <option> Spam </option>
            <option> Acoso </option>
            <option> Lenguaje que incita al odio </option>
            <option> Información falsa </option>
            <option> Suicidio o autolesiones </option>
            <option> Otro problema </option>
        </select>
    </div>
    <div class="Columna">
        <label for="validationTextarea" class="form-label Title Min"> Escribenos lo sucedido: </label>
        <textarea class="form-control Text" id="validationTextarea" name="NameReporte" placeholder="Ingresa la información pedida" autocomplete="off" required></textarea>
    </div>
    <div class="Columna">
        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
        <label class="form-check-label Text" for="invalidCheck">
            Aceptas que será evaluado el reporte, y en todo caso de que sea falso, tendrás una sanción.
        </label>
    </div>
    <button class="Cerrar" type="button">
        <img src="Icons/Cerrar.png" alt="">
        <div class="Hitbox C"></div>
    </button>
    <button class="Btn" name="Reportar" type="button">
        <p class="Text"> Enviar reporte </p>
    </button>
</form>