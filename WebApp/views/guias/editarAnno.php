
<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>
<div class="detalle">
    <h1 class="section__heading"><span>Generación Equipo de Trabajo</span></h1>
    <form method="post" action="/anno/equipo">
    <?php if(!empty($anno)){ ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Generación Actual A Cargo</th>
                        <th scope="col" class="table__th">Nueva Generación</th>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $anno; ?>
                            </td>
                            <td class="table__td">
                            <select name="years" class>
                                <?php
                                $currentYear = date("Y");

                                for ($year = 2010; $year <= 2030; $year++) {
                                    echo "<option value='$year'>$year</option>";
                                }
                                ?>
                            </select>
                            </td>
                            
                        </tr>
                </tbody>
            </table>
            <div class = asignar_actions>
                <input type="hidden" name="equipo" value="<?php echo $equipoId; ?>">
                <button type="submit" class="submit-button">Actualizar</button>
            </div>
        </form>
    <?php } ?>

</div>
