<div class="auth">
    <h1 class="auth__title">Recuperar Contraseña</h1>
    <p class="auth__description">Recupera la contraseña de tu cuenta</p>

    <form action="/recover" class="form">
        <div class="form__field">
            <label for="email" class="form__label">Correo Electrónico</label>
            <input type="email" class="form__input" placeholder="Tu Correo Electrónico" id="email" name="email">
        </div> <!-- .form__field -->

        <div class="form__actions">
            <input type="submit" class="form__submit" value="Enviar Instrucciones">
        </div>
    </form>
</div>