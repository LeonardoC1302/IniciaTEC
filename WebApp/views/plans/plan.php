<a href="/plans" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="plan">
    <div class="plan__main">
        <div class="plan__info">
            <h1 class="plan__info__title"><?php echo $plan->nombre; ?></h1>
            <p class="plan__info__description"><?php echo $plan->descripcion; ?></p>
        </div>
        <a href="/plan/add?plan=<?php echo $plan->id; ?>" class="plan__add">
            <i class="fa-solid fa-circle-plus"></i>
            Agregar Actividad
        </a>
    </div>

    <h2 class="plan__activities__title">Actividades</h2>
    <div class="plan__activities">
        <?php if(!empty($activities)){
            foreach($activities as $activity){ ?>
            <div class="activityCard <?php echo ($activity->estadoId == $cancelada || $activity->estadoId == $realizada) ? 'activityCard--inactiva' : ''; ?>">
                <h2 class="activityCard__name"><?php echo $activity->nombre; ?></h2>
                <div class="activityCard__container">
                    <div class="activityCard__info">
                        <p class="activityCard__info__content"><span>Tipo: </span><?php echo $activity->tipo; ?></p>
                        <p class="activityCard__info__content"><span>Semana: </span><?php echo $activity->semana; ?></p>
                        <p class="activityCard__info__content"><span>Fecha: </span><?php echo $activity->fecha; ?></p>
                        <p class="activityCard__info__content"><span>Responsable: </span><?php echo $activity->responsable; ?></p>
                        <p class="activityCard__info__content"><span>Días previos para anunciar: </span><?php echo $activity->diasAnuncio ?? 'No definido'; ?></p>
                        <p class="activityCard__info__content"><span>Días para recordatorios: </span><?php echo $activity->diasRecordatorio ?? 'No definido'; ?></p>
                        <p class="activityCard__info__content"><span>Modalidad: </span><?php echo $activity->modalidadStr; ?></p>
                        <p class="activityCard__info__content"><span>Enlace: </span><?php echo ($activity->enlace !== '') ? $activity->enlace : 'No aplica'; ?></p>
                        <p class="activityCard__info__content"><span>Afiche: </span><?php echo $activity->afiche;?></p>
                    </div>
                    <a href="/plans/plan/activity?id=<?php echo $activity->id; ?>&plan=<?php echo $plan->id; ?>" class="activityCard__view">
                        <i class="fa-solid fa-eye"></i>
                        Ver Actividad
                    </a>
                </div>
            </div>
        <?php }
        } else{ ?>
            <p class="plan__empty">No hay actividades registradas</p>
        <?php } ?>
    </div>
</div>