<?php
namespace Controllers;


use Model\Campus;   
use Model\Asistentes;   
use Model\User; 
use Model\Professor; 
use MVC\Router;  


class GuiasController {
  
    public static function asistentesAdmin(Router $router){
        $router->render('guias/asistentesAdmin');
    }

    public static function asignarAsistente(Router $router){
        $router->render('guias/asignarAsistente');
    }
    
    public static function update(Router $router){
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $campus_id = $_POST["campus"];
        
            if ($campus_id) {
                
                $usuarioId = $_POST["asistente"];
        
                // Realizar la actualización en la base de datos
                $query = "UPDATE usuario SET campusId = $campus_id WHERE id = $usuarioId";
                Asistentes::update2($query);
                header('Location: /guias');

            } else {
                // Manejar el caso en el que no se encuentre el campus
                echo "El campus seleccionado no fue encontrado.";
            }
        }
    }
    public static function crearEquipo(Router $router)
    {
        $alerts = [];
        $professors = Professor::all();

        foreach ($professors as $professor) {
            $user = User::find($professor->usuarioId);

            $professor->nombre = $user->nombre;
            $professor->apellidos = $user->apellidos;
            $professor->correo = $user->correo;
            $professor->celular = $user->celular;

            $professor->coordinador = $professor->isCoordinador ? 'Sí' : 'No';
            $professor->id = $professor->id;
        }
        $alerts = Professor::getalerts();
        $router->render('guias/crearEquipo', [
            'alerts' => $alerts,
            'professors' => $professors
        ]);
    }
    public static function createTeam(Router $router) {
        $alerts = [];
        $professors = Professor::all();
        $selectedProfessors = $_POST['professors'] ?? [];
        
    
        if (count($selectedProfessors) !== 5) {
            Professor::setAlert('error', 'Debe seleccionar exactamente 5 profesores.');
        }
        else {
            $coordinatorCount = 0;
            $AL = 0;
            $CA = 0;
            $LI = 0;
            $SJ = 0;
            $SC = 0;
            foreach ($selectedProfessors as $professorId) {
                $profesorId = Professor::find($professorId);
                $user = User::find($profesorId->usuarioId);

                $profesorId->nombre = $user->nombre;
                $profesorId->apellidos = $user->apellidos;
                $profesorId->correo = $user->correo;
                $profesorId->celular = $user->celular;
                $profesorId->campusId = $user->campusId;

                $profesorId->coordinador = $profesorId->isCoordinador ? 'Sí' : 'No';
                $profesorId->id = $profesorId->id;

                if ($profesorId && $profesorId->coordinador === 'Sí') {
                    $coordinatorCount++;
                }
                if ($profesorId && $profesorId->campusId === '1') {
                    $AL++;
                }
                if ($profesorId && $profesorId->campusId === '2') {
                    $CA++;
                }
                if ($profesorId && $profesorId->campusId === '3') {
                    $SJ++;
                }
                if ($profesorId && $profesorId->campusId === '4') {
                    $SC++;
                }
                if ($profesorId && $profesorId->campusId === '5') {
                    $LI++;
                }
            }
            if ($AL|$CA|$SJ|$SC|$LI !== 1){
                Professor::setAlert('error', 'Debe seleccionar exactamente 1 profesor por sede/recinto.');
            }
            else if ($coordinatorCount !== 1) {
                Professor::setAlert('error', 'Debe seleccionar exactamente 1 coordinador.');
            } else {
                Professor::setAlert('success', 'Grupo creado exitosamente.');
            }
        }
    
        $alerts = Professor::getalerts();
        foreach ($professors as $professor) {
            $user = User::find($professor->usuarioId);

            $professor->nombre = $user->nombre;
            $professor->apellidos = $user->apellidos;
            $professor->correo = $user->correo;
            $professor->celular = $user->celular;

            $professor->coordinador = $professor->isCoordinador ? 'Sí' : 'No';
            $professor->id = $professor->id;
        }
        $router->render('guias/crearEquipo',[
            'alerts' => $alerts,
            'professors' => $professors
        ]);
    }
    
    
    

}