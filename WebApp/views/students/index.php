<div class="students_actions">
    <a href="/register-student" class="students_actions__register">Registrar Estudiante</a>
    <a href="/student-report" class="students_actions__report">Generar Reporte</a>
</div>


<div class="students">
    <?php if(!empty($students)){ ?>
        <table class="table">
            <thead class="table__thead">
                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Apellidos</th>
                    <th scope="col" class="table__th">Carnet</th>
                    <th scope="col" class="table__th">Campus</th>
                    <th scope="col" class="table__th"></th>
                </tr>
            </thead>

            <tbody class="table__tbody">
                <?php foreach($students as $student){?>
                    <tr class="table__tr">
                        <td class="table__td">
                            <?php echo $student->nombre; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $student->apellidos; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $student->carnet; ?>
                        </td>
                        <td class="table__td">
                            <?php echo $student->campus; ?>
                        </td>
                        <td class="table__td--actions">
                            <a href="/students/update?id=<?php echo $student->id; ?>" class="table__action table__action--edit">
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </a>

                            <form action="/students/delete" class="table__form">
                                <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                                <button class="table__action table__action--delete" type="submit">
                                    <i class="fa-solid fa-trash"></i>
                                    BORRAR
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="students__empty">No hay estudiantes registrados</p>
    <?php } ?>
</div>