<div class="notifications">
    <h2 class="notifications__title">Notificaciones</h2>

    <div class="notifications__list">
        <?php foreach($notifications as $reminder){?>
            <div class="reminder <?php
                if($reminder->tipo == "Cancelación"){
                    echo "reminder--cancellation";
                } else if($reminder->tipo == "Anuncio"){
                    echo "reminder--announcement";
                } else if($reminder->tipo == "Publicación"){
                    echo "reminder--publication";
                }
            ?>">
                <div class="reminder__container">
                    <p class="reminder__date"><?php echo $reminder->fecha; ?></p>
                    <p class="reminder__content"><?php echo $reminder->contenido; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>