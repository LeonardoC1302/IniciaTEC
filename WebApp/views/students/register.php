<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>

<div class="register-student">
    <h1 class="register-student__title">Registrar estudiante</h1>
    <p class="register-student__description">Ingrese un documento CSV con los datos del estudiante en el siguiente formulario</p>

    <form method="POST" enctype="multipart/form-data" class="register-form" id="register">
        <div class="register-form__container" id="registerContainer">
            <i class="fa-solid fa-file-import"></i>
            <label for="file" class="register-form__label" id="fileLabel">Click para subir archivo</label>
            <input type="file" class="register-form__input" id="file" accept=".csv" name="file">
        </div>
        <input type="submit" class="register-form__submit" value="Registrar">

        <p class="register-form__restriction">Únicamente archivos CSV</p>
    </form>

</div>