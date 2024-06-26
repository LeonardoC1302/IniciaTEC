<a href="/" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>



<main class="assistants_actions">
    <div class="asistentes">
        <h1 class="section__heading"><span>Asistentes Administrativas</span></h1>
        <?php if (isAssistantCartago() || isAdmin()) { ?>
            <a href="guias/asignar/asistente" class="assistants_actions__type1">Asignar Asistente Administrativo por Campus </a>
            <br>
            <a href='/guias/register-asistente' class="assistants_actions__type2">Registrar Asistente</a>
            <br>
        <?php } ?>
        <?php if (isAssistant() || isAdmin()) { ?>
            <a href="guias/crear/equipo" class="assistants_actions__type1">Crear Equipo de Trabajo</a>
            <br>
            <a href="/ver/eliminar/equipo" class="assistants_actions__type2">Ver y Eliminar Equipo de Trabajo</a>
            <br>
        <?php } ?>

        <?php if (isTeacher() && !isAssistant()) { ?>
            <a href="/ver/eliminar/equipo" class="assistants_actions__type2">Ver Equipo de Trabajo</a>
        <?php } ?>
    </div>


</main>