<div class="auth">
    <h1 class="auth__title">Iniciar Sesión</h1>
    <p class="auth__description">Inicia Sesión en IniciaTEC</p>

    <form action="/login" class="form">
        <div class="form__field">
            <label for="email" class="form__label">Correo Electrónico</label>
            <input type="email" class="form__input" placeholder="Tu Correo Electrónico" id="email" name="email">
        </div> <!-- .form__field -->
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <input type="password" class="form__input" placeholder= "**********" id="password" name="password">
        </div>

        <div class="form__actions">
            <input type="submit" class="form__submit" value="Iniciar Sesión">
            <a href="/recover" class="form__action">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
</div>