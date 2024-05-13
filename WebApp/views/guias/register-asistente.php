<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="create-asistant">
    <?php
    include_once __DIR__ . "/../templates/alerts.php";
    ?>
    <h1 class="asistente__title">Registrar Asistente</h1>
    <form class="create-student__form" method="POST">
        <div class="create-student__form__field">
            <label for="name" class="create-student__form__label">Nombre</label>
            <input class="create-student__form__input" type="text" placeholder="Ingrese su nombre" id="name" name="nombre">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="lastname" class="create-student__form__label">Apellidos</label>
            <input class="create-student__form__input" type="text" placeholder="Ingrese su apellido" id="lastname" name="apellidos">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="email" class="create-student__form__label">Correo Electrónico</label>
            <input class="create-student__form__input" type="email" placeholder="Ingrese su correo electrónico" id="email" name="correo">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="phone" class="create-student__form__label">Número Teléfono </label>
            <input class="create-student__form__input" type="tel" placeholder="Ingrese su número de teléfono" id="phone" name="celular">
        </div> <!-- /create-student__form__field -->


        <input class="create-student__form__submit" type="submit" value="Registrar">
    </form>
</div>