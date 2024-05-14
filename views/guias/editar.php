
<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<?php
include_once __DIR__ . "/../templates/alerts.php";
?>
<div class="professors_actions">
    <form method="POST" action="/add/equipo/trabajo">
        <input type="hidden" name="professors" value="<?php echo htmlspecialchars(json_encode($professors)); ?>">
        <input type="hidden" name="equipo" value="<?php echo $equipoId; ?>">
        <button class="professors_actions__register" type="submit">
            Agregar Profesor
        </button>
    </form>
    <form method="POST" action="/edit/equipo/trabajo">
        <input type="hidden" name="professors" value="<?php echo htmlspecialchars(json_encode($professors)); ?>">
        <input type="hidden" name="equipo" value="<?php echo $equipoId; ?>">
        <button class="professors_actions__register" type="submit">
        Cambiar Generación
        </button>
    </form>
</div>
<div class="professors">
    <h1 class="section__heading"><span>Editar el Equipo de Trabajo</span></h1>
    <?php if(!empty($professors)){ ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Nombre</th>
                        <th scope="col" class="table__th">Apellidos</th>
                        <th scope="col" class="table__th">Código</th>
                        <th scope="col" class="table__th">Correo</th>
                        <th scope="col" class="table__th">Teléfono</th>
                        <th scope="col" class="table__th">Celular</th>
                        <th scope="col" class="table__th">Coordinador</th>
                        <th scope="col" class="table__th"></th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($professors as $professor){?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $professor->nombre; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->apellidos; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->codigo; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->correo; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->telefono; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->celular; ?>
                            </td>
                            <td class="table__td">
                                <?php echo $professor->coordinador; ?>
                            </td>
                            <td class="table__td--actions">
                                <form method="POST" action="/editar/equipo/trabajo?id=<?php echo $equipoId;?>" class="table__form">
                                    <input type="hidden" name="id" value="<?php echo $professor->id; ?>">
                                    <input type="hidden" name="equipo" value="<?php echo $equipoId; ?>">
                                    <input type="hidden" name="profes" value="<?php echo htmlspecialchars(json_encode($professors)) ?>">
                                    <button  class="table__action table__action--delete" type="submit">
                                        <i class="fa-solid fa-trash"></i>
                                        Dar de Baja
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            
            
    <?php } ?>

</div>

