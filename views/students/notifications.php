<div class="notifications">
    <h2 class="notifications__title">Notificaciones</h2>

    <form method="POST" class="notifications__form">
        <!-- Form para filtrar por leídos o no leídos -->
        <button class="button-filtro <?php if($filtro == "todas" || $filtro == ""){
            echo "button-filtro--active";
        }
        ?>" type="submit" name="filtro" value="todas" id="todas">Todas</button>
        <button class="button-filtro <?php if($filtro == "leidas" || $filtro == ""){
            echo "button-filtro--active";
        }
        ?>" type="submit" name="filtro" value="leidas" id="leidas">Leídas</button>
        <button class="button-filtro <?php if($filtro == "no-leidas" || $filtro == ""){
            echo "button-filtro--active";
        }
        ?>" type="submit" name="filtro" value="no-leidas" id="no-leidas">No leídas</button>
    </form>

    <div class="notifications__list">
        <?php if(empty($notifications)){ ?>
            <p class="notifications__empty">No tienes notificaciones</p>
        <?php } ?>
        <?php foreach($notifications as $reminder){?>
            <div class="reminder <?php
                if($reminder->tipo == "Cancelación"){
                    echo "reminder--cancellation";
                } else if($reminder->tipo == "Anuncio"){
                    echo "reminder--announcement";
                } else if($reminder->tipo == "Publicación"){
                    echo "reminder--publication";
                }?> <?php if(!$reminder->new){
                    echo "reminder--read";
                }?>">
                <div class="reminder__container">
                    <p class="reminder__date"><?php echo $reminder->fecha; ?></p>
                    <p class="reminder__content"><?php echo $reminder->contenido; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>