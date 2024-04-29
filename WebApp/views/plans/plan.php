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
        <a href="/plan/add" class="plan__add">
            <i class="fa-solid fa-circle-plus"></i>
            Agregar Actividad
        </a>
    </div>

    <h2 class="plan__activities__title">Actividades</h2>
    <div class="plan__activities">
        <?php if(!empty($activities)){
            foreach($activities as $activity){ ?>
            <div class="activity">
                <h2 class="activity__name"><?php echo $activity->nombre; ?></h2>
                <div class="activity__container">
                    <div class="activity__info">
                        <p class="activity__info__content"><span>Tipo: </span><?php echo $activity->tipo; ?></p>
                        <p class="activity__info__content"><span>Semana: </span><?php echo $activity->semana; ?></p>
                        <p class="activity__info__content"><span>Fecha: </span><?php echo $activity->fecha; ?></p>
                        <p class="activity__info__content"><span>Responsable: </span><?php echo $activity->responsable; ?></p>
                        <p class="activity__info__content"><span>Días previos para anunciar: </span><?php echo $activity->anunciar ?? 'No definido'; ?></p>
                        <p class="activity__info__content"><span>Días para recordatorios: </span><?php echo $activity->recordatorio ?? 'No definido'; ?></p>
                        <p class="activity__info__content"><span>Modalidad: </span><?php echo $activity->modalidadStr; ?></p>
                        <p class="activity__info__content"><span>Enlace: </span><?php echo $activity->enlace ?? 'No aplica'; ?></p>
                        <p class="activity__info__content"><span>Afiche: </span><?php echo $activity->afiche;?></p>
                    </div>
                    <a href="/plans/plan/activity" class="activity__view">
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