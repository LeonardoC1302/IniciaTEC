<div class="professors">
    <h1 class="section__heading"><span>Crear Equipo de Trabajo</span></h1>
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
                        <td class="table__td">
                            <input type="checkbox" name="professors[]" value="<?php echo $professor->id; ?>">
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="select-all">
            <label>Seleccionar Todos</label>
            <input type="checkbox" id="select-all-professors">
        </div>
    <?php } else { ?>
        <p class="students__empty">No hay profesores registrados</p>
    <?php } ?>
</div>

<script>
    document.getElementById('select-all-professors').addEventListener('change', function() {
        var checkboxes = document.querySelectorAll('input[name="professors[]"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = event.target.checked;
        });
    });
</script>
