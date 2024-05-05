<a href="/" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>


<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>
<div class="auth">
    <h1 class="auth__title">Iniciar Sesión</h1>
    <p class="auth__description">Inicia Sesión en IniciaTEC</p>

    <form method="POST" action="/login" class="form">
        <div class="form__field">
            <label for="email" class="form__label">Correo Electrónico</label>
            <input type="email" class="form__input" placeholder="Tu Correo Electrónico" id="email" name="correo">
        </div> <!-- .form__field -->
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <input type="password" class="form__input" placeholder= "**********" id="password" name="contrasenna">
        </div>

        <div class="form__actions">
            <input type="submit" class="form__submit" value="Iniciar Sesión">
            <a href="/recover" class="form__action">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
</div>