<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>
<div class="auth">
    <h1 class="auth__title">Cambiar Contraseña</h1>
    <p class="auth__description">Cambia tu contraseña de IniciaTEC</p>

    <form method="POST" class="form">
        <div class="form__field">
            <label for="password" class="form__label">Nueva Contraseña</label>
            <input type="password" class="form__input" placeholder= "**********" id="password" name="contrasenna">
        </div>

        <div class="form__actions">
            <input type="submit" class="form__submit" value="Cambiar Contraseña">
        </div>
    </form>
</div>