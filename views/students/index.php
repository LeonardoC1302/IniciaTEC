<div class="students_actions">
    <a href="/register-student" class="students_actions__register">Registrar Estudiante</a>
    <a href="/student-report" class="students_actions__report">Generar Reporte</a>
</div>


<div class="students">
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
            <tr class="table__tr">
                <td class="table__td">
                    Leonardo
                </td>
                <td class="table__td">
                    Céspedes Tenorio
                </td>
                <td class="table__td">
                    2022080602
                </td>
                <td class="table__td">
                    CA
                </td>
                <td class="table__td--actions">
                    <a href="/students/update?id=1" class="table__action table__action--edit">
                        <i class="fa-solid fa-pen"></i>
                        Editar
                    </a>

                    <form action="/students/delete" class="table__form">
                        <input type="hidden" name="id" value="1">
                        <button class="table__action table__action--delete" type="submit">
                            <i class="fa-solid fa-trash"></i>
                            BORRAR
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</div>