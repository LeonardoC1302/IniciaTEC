
<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>
<?php
    include_once __DIR__ . "/../templates/alerts.php";
?>

<div class="detalle">   
    <h1 class="section__heading"><span>Ver Equipo de Trabajo</span></h1>
    <?php if(!empty($equipos)){ ?>
            <table class="table">
                <thead class="table__thead">
                    <tr>
                        <th scope="col" class="table__th">Equipo</th>
                        <th scope="col" class="table__th"></th>
                        <?php if(isAssistant()){ ?>
                            <th scope="col" class="table__th"></th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody class="table__tbody">
                    <?php foreach($equipos as $equipo){?>
                        <tr class="table__tr">
                            <td class="table__td">
                                <?php echo $equipo->nombre; ?>
                            </td>
                            <td class="table__td">
                                <a href="/ver/equipo/trabajo?id=<?php echo $equipo->nombre; ?>" class="activityCard__view">
                                    <i class="fa-solid fa-eye"></i>
                                    Ver Detalles
                                </a>
                            </td>
                            <?php if(isAssistant()){ ?>
                                <td class="table__td">
                                    <a href="/editar/equipo/trabajo?id=<?php echo $equipo->nombre;?>" class="activityCard__view">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar Equipo
                                    </a>
                                </td>
                            <?php } ?>
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

