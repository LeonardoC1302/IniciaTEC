<a href="/students" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>


<div class="edit_student">
    <?php
        include_once __DIR__ . "/../templates/alerts.php";
    ?>
    <h1 class="student__title">Editar Estudiante</h1>

    <form method="POSt" class="edit_student__form">
        <div class="edit_student__form__field">
            <label for="nombre" class="edit_student__form__label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="edit_student__form__input" value=<?php echo $student->nombre; ?>>
        </div>

        <div class="edit_student__form__field">
            <label for="apellidos" class="edit_student__form__label">Apellidos</label>
            <input type="text" id="apellidos" name="apellidos" class="edit_student__form__input" value="<?php echo $student->apellidos; ?>">
        </div>

        <div class="edit_student__form__field">
            <label for="carnet" class="edit_student__form__label">Carnet</label>
            <input type="text" id="carnet" name="carnet" class="edit_student__form__input" value="<?php echo $student->carnet; ?>">
        </div>

        <div class="edit_student__form__field">
            <label for="correo" class="edit_student__form__label">Correo</label>
            <input type="email" id="correo" name="correo" class="edit_student__form__input" value="<?php echo $student->correo; ?>">
        </div>

        <div class="edit_student__form__field">
            <label for="celular" class="edit_student__form__label">Celular</label>
            <input type="text" id="celular" name="celular" class="edit_student__form__input" value="<?php echo $student->celular; ?>">
        </div>

        <div class="edit_student__form__field">
            <label for="campus" class="edit_student__form__label">Campus</label>
            <input type="text" id="campus" name="campus" class="edit_student__form__input" value="<?php echo $student->campus; ?>">
        </div>

        <button type="submit" class="edit_student__form__submit">Editar</button>
    </form>
</div>