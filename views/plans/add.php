<a href="/plans/plan?id=<?php echo $planId; ?>" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="add-activity">
    <?php
        include_once __DIR__ . "/../templates/alerts.php";
    ?>
    <h1 class="add-activity__title">Registrar Actividad</h1>

    <form class="add-activity__form" method="POST" enctype="multipart/form-data">
        <div class="add-activity__form__field">
            <label for="nombre" class="add-activity__form__label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="add-activity__form__input" required placeholder="Ej. Actividad #1" value="<?php echo $activity->nombre ?>">
        </div>

        <div class="add-activity__form__field">
            <label for="semana" class="add-activity__form__label">Semana</label>
            <input type="number" id="semana" name="semana" class="add-activity__form__input" required min="1" max="16" value="1" value="<?php echo $activity->semana ?>">
        </div>

        <div class="add-activity__form__field">
            <label for="tipo" class="add-activity__form__label">Tipo</label>
            <select id="tipo" name="tipoId" class="add-activity__form__input" required>
                <option value="">-- Seleccione un tipo --</option>
                <?php foreach($types as $type): ?>
                    <option <?php echo ($type->id === $activity->tipoId) ? 'selected' : '' ?> value="<?php echo $type->id; ?>"><?php echo $type->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="add-activity__form__field">
            <label for="modalidad" class="add-activity__form__label">Modalidad</label>
            <select id="modalidad" name="modalidad" class="add-activity__form__input" required>
                <option value="">-- Seleccione una modalidad --</option>
                <?php foreach($modalities as $key => $modality): ?>
                    <option <?php echo ($key == $activity->modalidad) ? 'selected' : '' ?> value="<?php echo $key; ?>"><?php echo $modality; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="add-activity__form__field">
            <label for="fecha" class="add-activity__form__label">Fecha de Realización</label>
            <input type="date" id="fecha" name="fecha" class="add-activity__form__input" required value="<?php echo $activity->fecha ?>" min="<?php echo date('Y-m-d'); ?>">
        </div>
        
        <div class="add-activity__form__field">
            <label for="fechaPublicacion" class="add-activity__form__label">Fecha de Publicación</label>
            <input type="date" id="fechaPublicacion" name="fechaPublicacion" class="add-activity__form__input" required value="<?php echo $activity->fechaPublicacion ?>" min="<?php echo date('Y-m-d'); ?>">
        </div>

        <div class="add-activity__form__field">
            <label for="responsable" class="add-activity__form__label">Responsable</label>
            <select id="responsable" name="responsableId" class="add-activity__form__input" required>
                <option value="">-- Seleccione un responsable --</option>
                <?php foreach($professors as $professor): ?>
                    <option <?php echo ($professor->id === $activity->responsableId) ? 'selected' : '' ?> value="<?php echo $professor->id; ?>"><?php echo $professor->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="add-activity__form__field">
            <label for="afiche" class="add-activity__form__label">Afiche</label>
            <input type="file" id="afiche" name="afiche" class="add-activity__form__input" value="<?php echo $activity->afiche ?>" accept=".pdf">
        </div>

        <div class="add-activity__form__field">
            <label for="recordatorio" class="add-activity__form__label">Días para recordatorio</label>
            <input type="number" id="recordatorio" name="diasRecordatorio" class="add-activity__form__input" required min="1" value="1" value="<?php echo $activity->diasRecordatorio ?>">
        </div>
        
        <div class="add-activity__form__field">
            <label for="anunciar" class="add-activity__form__label">Días para anunciar</label>
            <input type="number" id="anunciar" name="diasAnuncio" class="add-activity__form__input" required min="1" value="1" value="<?php echo $activity->diasAnuncio ?>">
        </div>

        <div class="add-activity__form__field">
            <label for="enlace" class="add-activity__form__label">Enlace</label>
            <input type="text" id="enlace" name="enlace" class="add-activity__form__input" placeholder="Ej. www.zoom.us" value="<?php echo $activity->enlace?>">
        </div>

        <div class="add-activity__form__field">
            <label for="estado" class="add-activity__form__label">Estado</label>
            <input type="text" class="add-activity__form__input" disabled value="Planeada">
        </div>

        <div class="add-activity__form__field--description">
            <label for="descripcion" class="add-activity__form__label">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="add-activity__form__input--textarea" required><?php echo $activity->descripcion; ?></textarea>
        </div>

        <button type="submit" class="add-activity__form__submit">Registrar</button>
    </form>
</div>