<a href="/plans/plan?id=<?php echo $planId; ?>" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="activity">
    <div class="activity__main">
        <h1 class="activity__main__title"><?php echo $activity->nombre; ?></h1>
        <?php if(isTeacher() || isAdmin()){ ?>
            <a class="activity__main__comment">
                <i class="fa-solid fa-comment"></i>
                Realizar Comentario
            </a>
        <?php } ?>
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
        <?php if(($activity->estado != 'Cancelada' && $activity->estado != 'Realizada') && (isCoordinator() || isAdmin())){ ?>
            <a href="/plan/activity/update?id=<?php echo $activity->id; ?>&plan=<?php echo $planId; ?>" class="activity__info__edit">
                <i class="fa-solid fa-pen-to-square"></i>
                Editar Actividad
            </a>
        <?php } ?>
    </div>

    <?php if($activity->estado == 'Realizada'){ ?>
        <div class="activity__evidences">
            <h2 class="activity__evidences__title">Evidencias</h2>
            <div class="evidences">
                <?php foreach($evidences as $evidence){ ?>
                    <picture>
                        <source srcset="/img/evidences/<?php echo $evidence->contenido;?>.webp" type="image/webp">
                        <source srcset="/img/evidences/<?php echo $evidence->contenido;?>.png" type="image/png">
        
                        <img class="evidences__image" loading="lazy" width="200" height="300" src="/img/evidences/<?php echo $evidence->contenido;?>.png" alt="Evidence Image">
                    </picture>
                <?php } ?>
            </div>
        </div>
    <?php } ?>

    <?php if($activity->estado == 'Cancelada'){ ?>
        <div class="activity__cancel">
            <h2 class="activity__cancel__title">Motivo de Cancelación</h2>
            <p class="activity__cancel__content"><?php echo $activity->justificacion; ?></p>
        </div>
    <?php } ?>

    <?php if(isTeacher() || isAdmin()){ ?>
        <div class="activity__comments">
            <h2 class="activity__comments__title">Comentarios</h2>
            <?php if(!empty($comments)){ ?>
                <div class="comments" id="comments">
                    <?php foreach($comments as $comment){ ?>
                        <div class="comment">
                            <div class="comment__info">
                                <p class="comment__data">Prof. <?php echo $comment->profesor ?> ( <?php echo $comment->fecha; ?> )</p>
                                <p class="comment__content"><?php echo $comment->contenido; ?></p>
                            </div>
                            <a class="comment__comment" data-commentId="<?php echo $comment->id; ?>">
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
                <p class="activity__comments__empty">No hay comentarios para esta actividad</p>
            <?php } ?>

            <div class="comment-form-container comment-form-container--disabled" id="commentForm">
                <i class="fa-solid fa-xmark" id="formClose"></i>
                <h3 class="comment-form-container__title">Realizar Comentario</h3>
                <form action="/plans/activity/comment" method="POST" class="comment-form">
                    <input type="hidden" name="actividadId" value="<?php echo $activity->id; ?>">
                    <input type="hidden" name="comentarioId" value="<?php echo null; ?>" id="inputCommentId">
                    <input type="hidden" name="planId" value="<?php echo $planId; ?>">
                    <textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="Escribe un comentario" class="comment-form__textarea"></textarea>
                    <button type="submit" class="comment-form__submit">Comentar</button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>