<a href="/students" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="edit_student">
    <?php
        include_once __DIR__ . "/../templates/alerts.php";
    ?>
    <h1 class="student__title">Crear Reporte de Estudiantes</h1>

    <div class="report">
        <form method="POST" class="report__form">
            <label class="report__form__label" for="Uno">Escoger tipo de reporte</label>
            <div class="report__form__options">
                <div id= "radioOne" class="report__form__options__option report__form__options__option--active">
                    <label  for="Uno">Un Campus</label>
                    <input class="report__form__radio" type="radio" id="Uno" name="options" value="1" checked>
                </div>
                <div id= "radioAll" class="report__form__options__option">
                    <label for="Todos">Todos los Campus</label>
                    <input class="report__form__radio" type="radio" id="Todos" name="options" value="2">
                </div>
            </div>
            <div id="report" class="report__form__container">
                <label class="report__form__label" for="dropdown">Campus:</label>
                <select class="report__form__select" id="campus" name="campus">
                    <option value="" disabled selected>Escoger Campus</option>
                    <?php foreach($campus as $c){ ?> 
                        <option value=<?php echo $c->id ?>><?php echo $c->nombre ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="report__form__submit">Submit</button>
        </form>
    </div>
</div>
