<div class="activities">
    <h2 class="activities__title">Cronograma de Actividades</h2>
    <p class="activities__description">Descubre todas las actividades del TEC en en siguiente cronograma</p>

    <ul class="activities__list">
        <?php 
        $counter = 1;
        foreach ($activities as $activity): ?>
            <li class="activities__item <?php echo ($counter == 1) ? 'activities__item--first' : '' ?>">
                <?php if($counter == 1){ ?>
                    <p class="activities__item__first">¡Actividad más próxima!</p>
                <?php } ?>
                <p class="activities__item__name"><?php echo $activity->nombre; ?></p>
                <p class="activities__item__date"><span>Fecha: </span> <?php echo $activity->fecha; ?></p>
                <p class="activities__item__description"><span>Descripción: </span> <?php echo $activity->descripcion; ?></p>
                <p class="activities__item__modality"><span>Modalidad: </span> <?php echo $activity->modalidadName; ?></p>

                <?php if($counter == 1){ ?>
                    <p class="activities__item__week"><span>Semana: </span> <?php echo $activity->semana; ?></p>
                    <p class="activities__item__type"><span>Tipo: </span> <?php echo $activity->typeName; ?></p>
                    <p class="activities__item__responsible"><span>Responsable: </span> <?php echo $activity->responsibleName; ?></p>
                    <p class="activities__item__publication-date"><span>Fecha de publicación: </span> <?php echo $activity->fechaPublicacion; ?></p>
                    <p class="activities__item__state"><span>Estado: </span> <?php echo $activity->stateName; ?></p>
                <?php } $counter++;?>
                    
            </li>
        <?php endforeach; ?>
    </ul>
</div>