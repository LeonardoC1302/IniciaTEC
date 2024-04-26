<div class="account">
    <div class="account__image_container">
        <picture>
            <source srcset="build/img/user_avatar.avif" type="image/avif">
            <source srcset="build/img/user_avatar.webp" type="image/webp">
            <img src="build/img/user_avatar.jpg" alt="About Image" loading="lazy" width="200" height="300" class="account__image">
        </picture>
    </div>

    <form action="/account" class="account__info">
        <div class="account__info__field">
            <label for="name" class="account__info__field__label">Nombre Completo</label>
            <input type="text" id="name" name="name" class="account__info__field__input" value="John Doe">
        </div> <!-- .account__info__field -->

        <div class="account__info__field">
            <label for="email" class="account__info__field__label">Correo Electrónico</label>
            <input type="email" id="email" name="email" class="account__info__field__input" value="jdoe@estudiantec.cr">
        </div> <!-- .account__info__field -->

        <div class="account__info__field">
            <label for="rol" class="account__info__field__label">Rol</label>
            <input type="text" id="rol" name="rol" class="account__info__field__input" value="Profesor Coordinador">
        </div> <!-- .account__info__field -->

        <input type="submit" class="account__info__submit" value="Actualizar Cuenta">
    </form>
</div>