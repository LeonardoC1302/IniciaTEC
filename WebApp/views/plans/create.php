<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="create-plan">
    <h1 class="create-plan__title">Crear Plan</h1>
    <p class="create-plan__description">Llena el siguiente formulario para registrar un nuevo plan de trabajo</p>

    <form method="POST" class="create-plan__form">
        <div class="create-plan__form__field">
            <label for="name" class="create-plan__form__label">Nombre del Plan</label>
            <input type="text" name="nombre" id="name" class="create-plan__form__input" required>
        </div>
        <div class="create-plan__form__field">
            <label for="description" class="create-plan__form__label">Descripción</label>
            <textarea name="descripcion" id="description" class="create-plan__form__textarea" required></textarea>
        </div>

        <button type="submit" class="create-plan__form__submit">Crear Plan</button>
    </form>
</div>