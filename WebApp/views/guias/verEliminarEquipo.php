<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>
<div class="assistants_actions">
    <div class = "asistentes">
    <h1 class="section__heading"><span>Ver Equipo de Trabajo</span></h1>
</div>
</div>

<div class="detalle">   
<?php if(!empty($equipos)){ ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Equipo</th>
                    <th scope="col" class="table__th"></th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($equipos as $equipo){?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $equipo->nombre; ?>
                        </td>
                        <td class="table__td--actions">
                            <form method="POST" action="/team/delete" class="table__form">
                                <input type="hidden" name="id" value="<?php echo $equipo->id; ?>">
                                <button class="table__action table__action--delete" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                    Dar de Baja
                                </button>
                            </form>
                        </td>
                    </tr>
                    
                <?php }?>
            </tbody>
        </table>
        <div class = asignar_actions>
        </div>
    </form>
<?php } else { ?>
    <p class="students__empty">No hay equipos registrados</p>
<?php } ?>
</div>

