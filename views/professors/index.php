<a href="/" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<div class="professors_actions">
    <a href="/professors/register" class="professors_actions__register">Registrar Profesor</a>
    <?php if(isAssistantCartago() || isAdmin()){ ?>
        <a href="/professors/coordinator" class="professors_actions__coordinator">Dar Rol Coordinador</a>
    <?php } ?>
</div>

<div class="professors">
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
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="students__empty">No hay profesores registrados</p>
    <?php } ?>
</div>