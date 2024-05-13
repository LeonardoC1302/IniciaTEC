<a href="/" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>
<?php if(isCoordinator() || isAdmin()){ ?>|
    <div class="plans__actions">
        <a href="/plans/create" class="plans__actions__create">Crear Plan de Trabajo</a>
    </div>
<?php } ?>


<div class="students">
    <?php if(!empty($plans)){ ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Cantidad de Actividades</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($plans as $plan){?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $plan->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $plan->actividades; ?>
                        </td>
                        <td class="table__td--actions">
                            <a href="/plans/plan?id=<?php echo $plan->id; ?>" class="table__action table__action--edit">
                                <i class="fa-solid fa-eye"></i>
                                Ver Plan
                            </a>

                            <?php if(isCoordinator() || isAdmin()){ ?>
                                <form method="POST" action="/plans/delete" class="table__form">
                                    <input type="hidden" name="id" value="<?php echo $plan->id; ?>">
                                    <button class="table__action table__action--delete" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                        BORRAR
                                    </button>
                                </form>
                            <?php } ?>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="plans__empty">No hay planes de trabajo registrados</p>
    <?php } ?>
</div>