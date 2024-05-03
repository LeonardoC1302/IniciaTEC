<a href="/plans/plan?id=<?php echo $planId; ?>" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="activity">
    <div class="activity__main">
        <h1 class="activity__main__title"><?php echo $activity->nombre; ?></h1>
        <a href="#" class="activity__main__comment">
            <i class="fa-solid fa-comment"></i>
            Realizar Comentario
        </a>
    </div>
    <div class="activity__card">
        <div class="activity__info">
            <p class="activity__info__content"><span>Tipo: </span><?php echo $activity->tipo; ?></p>
            <p class="activity__info__content"><span>Semana: </span><?php echo $activity->semana; ?></p>
            <p class="activity__info__content"><span>Fecha: </span><?php echo $activity->fecha; ?></p>
            <p class="activity__info__content"><span>Responsable: </span><?php echo $activity->responsable; ?></p>
            <p class="activity__info__content"><span>Días previos para anunciar: </span><?php echo $activity->diasAnuncio ?? 'No definido'; ?></p>
            <p class="activity__info__content"><span>Días para recordatorios: </span><?php echo $activity->diasRecordatorio ?? 'No definido'; ?></p>
            <p class="activity__info__content"><span>Modalidad: </span><?php echo $activity->modalidadStr; ?></p>
            <p class="activity__info__content"><span>Enlace: </span><?php echo ($activity->enlace !== '') ? $activity->enlace : 'No aplica'; ?></p>
            <p class="activity__info__content"><span>Afiche: </span><?php echo $activity->afiche;?></p>
            <p class="activity__info__content"><span>Estado: </span><?php echo $activity->estado;?></p>
        </div>
        <a href="/plan/activity/update?id=<?php echo $activity->id; ?>&plan=<?php echo $planId; ?>" class="activity__info__edit">
            <i class="fa-solid fa-pen-to-square"></i>
            Editar Actividad
        </a>
    </div>

    <div class="activity__comments">
        <h2 class="activity__comments__title">Comentarios</h2>
        <?php if(!empty($comments)){ ?>
            <div class="comments">
                <?php foreach($comments as $comment){ ?>
                    <div class="comment">
                        <div class="comment__info">
                            <p class="comment__data">Prof. <?php echo $comment->profesor ?> ( <?php echo $comment->fecha; ?> )</p>
                            <p class="comment__content"><?php echo $comment->contenido; ?></p>
                        </div>
                        <a href="#" class="comment__comment">
                            <i class="fa-solid fa-comment"></i>
                        </a>
                    </div>

                    <?php foreach($comment->subcomments as $subcomment){ ?>
                        <div class="comment--subcomment">
                            <div class="comment__info">
                                <p class="comment__data">Prof. <?php echo $subcomment->profesor ?> ( <?php echo $subcomment->fecha; ?> )</p>
                                <p class="comment__content"><?php echo $subcomment->contenido; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="activity__comments__empty">No hay comentarios para     esta actividad</p>
        <?php } ?>
    </div>
</div>