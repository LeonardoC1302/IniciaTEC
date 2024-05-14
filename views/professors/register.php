<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="create-student">
    <?php
        include_once __DIR__ . "/../templates/alerts.php";
    ?>
    <h1 class="professor__title">Registrar Profesor</h1>
    <form class="create-student__form" method="POST" enctype="multipart/form-data">
        <div class="create-student__form__field">
            <label for="campus" class="create-student__form__label">Campus</label>
            <select id="campus" name="campusId" class="create-student__form__select">
                <option value="">-- Selecciona un Campus --</option>
                <?php foreach($campus as $c) { ?>
                    <option <?php echo ($professor->campusId === $c->id) ? 'selected' : '' ?> value="<?php echo $c->id; ?>"><?php echo $c->nombre; ?></option>
                <?php } ?>
            </select>
        </div> <!-- /create-student__form__field -->
<!--
        <div class="create-student__form__field">
            <label for="code" class="create-student__form__label">Código</label>
            <input readonly class="create-student__form__input" type="text" placeholder="XX-NN" id="code" name="codigo" value="<?php echo $professor->codigo; ?>">
        </div> 
-->
        <div class="create-student__form__field">
            <label for="name" class="create-student__form__label">Nombre</label>
            <input class="create-student__form__input" type="text" placeholder="Ingrese su nombre" id="name" name="nombre" value="<?php echo $professor->nombre; ?>">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="lastname" class="create-student__form__label">Apellidos</label>
            <input class="create-student__form__input" type="text" placeholder="Ingrese su apellido" id="lastname" name="apellidos" value="<?php echo $professor->apellidos; ?>">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="email" class="create-student__form__label">Correo Electrónico</label>
            <input class="create-student__form__input" type="email" placeholder="Ingrese su correo electrónico" id="email" name="correo" value="<?php echo $professor->correo; ?>">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="office-phone" class="create-student__form__label">Número Tel. Oficina</label>
            <input class="create-student__form__input" type="tel" placeholder="Ingrese su número de teléfono de oficina" id="office-phone" name="telefono" value="<?php echo $professor->telefono; ?>">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="phone" class="create-student__form__label">Número Teléfono </label>
            <input class="create-student__form__input" type="tel" placeholder="Ingrese su número de teléfono" id="phone" name="celular" value="<?php echo $professor->celular; ?>">
        </div> <!-- /create-student__form__field -->
        <div class="create-student__form__field">
            <label for="imagen" class="create-student__form__label">Fotografía</label>
            <input class="create-student__form__input--photo" type="file" id="imagen" name="foto" accept="image/jpeg, image/png" value="<?php echo $professor->foto; ?>">
        </div> <!-- /create-student__form__field -->
        
        <input class="create-student__form__submit" type="submit" value="Registrar">
    </form>
</div>