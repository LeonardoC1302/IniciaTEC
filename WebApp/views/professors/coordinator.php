<div class="coordinator">
    <h1 class="coordinator__title">Asignar Rol de Coordinador</h1>
    <p class="coordinator__description">Asigna rol de coordinador a un profesor mediante el siguiente formulario</p>

    <form method="POST" class="coordinator__form">
        <h3 class="coordinator__form__title">Selecciona un equipo de trabajo</h3>
        <div class="coordinator__form__field" id="radioTeams">
            <?php foreach($teams as $team){ ?>
                <label class="coordinator__form__label--radio">
                    <input type="radio" class="coordinator__form__radio" name="teamId" value="<?php echo $team->id; ?>">
                    <span class="coordinator__form__radio__text"><?php echo $team->nombre; ?></span>    
                </label>
            <?php } ?>
        </div>

        <div class="coordinator__form__professors" id="teamProfessors"></div>
    </form>
</div>