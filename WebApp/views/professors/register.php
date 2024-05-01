<a href="/professors" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<h1>Registrar Profesor</h1>
<div class="create-form">
    <form class="form" method="POST" enctype="multipart/form-data">
        <div class="form__field">
            <label for="campus" class="form__label">Campus</label>
            <select id="campus" name="campus">
                <option value="Central">Central</option>
                <option value="Alajuela">Alajuela</option>
                <option value="San José">San José</option>
                <option value="San Carlos">San Carlos</option>
                <option value="Limon">Limon</option>
            </select>
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="code" class="form__label">Código</label>
            <input class="form__input" type="text" placeholder="XX-NN" id="code" name="code">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="name" class="form__label">Nombre</label>
            <input class="form__input" type="text" placeholder="Ingrese su nombre" id="name" name="name">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="lastname" class="form__label">Apellido</label>
            <input class="form__input" type="text" placeholder="Ingrese su apellido" id="lastname" name="lastname">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="email" class="form__label">Correo Electrónico</label>
            <input class="form__input" type="email" placeholder="Ingrese su correo electrónico" id="email" name="email">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="office-phone" class="form__label">Número Tel. Oficina</label>
            <input class="form__input" type="tel" placeholder="Ingrese su número de teléfono de oficina" id="office-phone" name="office-phone">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="phone" class="form__label">Número Teléfono </label>
            <input class="form__input" type="tel" placeholder="Ingrese su número de teléfono" id="phone" name="phone">
        </div> <!-- /form__field -->
        <div class="form__field">
            <label for="imagen" class="form__label">Fotografía</label>
            <input class="form__input" type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">
        </div> <!-- /form__field -->
    </form>
</div>

<div class="button-container">
    <input class="form__submit" type="submit" value="Registrar" onclick="return confirm('¿Está seguro que quiere registrar al profesor?')">

</div>