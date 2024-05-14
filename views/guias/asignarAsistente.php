<a href="#" onclick="history.back()" class="volver">
    <i class="fa-solid fa-circle-left"></i>
    Volver
</a>

<?php


$campus_list = Model\Campus::all();
$asistentes_list = Model\Asistentes::join("SELECT usuario.id, CONCAT(usuario.nombre, ' ', usuario.apellidos) AS nombre_asistente
                                            FROM usuario
                                            JOIN asistente ON usuario.id = asistente.usuarioId
                                            WHERE usuario.campusId IS NULL");

$campus_options = "";
$campus_options = "<option value='' disabled selected>Seleccione Campus a Asignar</option>";
foreach ($campus_list as $campus) {
    $campus_options .= "<option value='" . $campus->id . "'>" . $campus->nombre . "</option>";
}
$asistentes_options = "<option value='' disabled selected>Asistentes Disponibles</option>"; // Texto predeterminado
foreach ($asistentes_list as $asistente) {
    $asistentes_options .= "<option value='" . $asistente['id'] . "'>" . $asistente['nombre_asistente'] . "</option>";
}
?>
<main class="asignar_actions"> 
    <div class="form-container">
        <h1 class="section__heading"><span>Asignar Asistentes Administrativas por Campus</span></h1>
        <form method="post" action="/guias/asignar/asistente">
            <div class="asignar_actions__select">
                <label >Asistentes Disponibles</label>
                <br>
                <select name="asistente" id="asistente">
                    <?php echo $asistentes_options; ?>
                </select>
            </div>
            <div class="asignar_actions__select">
                <label >Campus</label>
                <br>
                <select name="campus" id="campus">
                    <?php echo $campus_options; ?>
                </select>
            </div>
            <button type="submit" class="submit-button">Asignar</button>
        </form>
    </div>
</main>
