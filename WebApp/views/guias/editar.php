
<a href="/" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>
<div class="professors_actions">
    <a href="/agregar/profesor?equipoId=<?php echo $equipoId; ?>" class="professors_actions__register">Agregar Profesor</a>
    <a href="/cambiar/anno" class="professors_actions__register">Cambiar Generación</a>
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
                                <form method="POST" action="/team/delete" class="table__form">
                                    <input type="hidden" name="id" value="<?php echo $professor->id; ?>">
                                    <input type="hidden" name="equipo" value="<?php echo $equipoId; ?>">
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
            
            
    <?php } ?>

</div>
