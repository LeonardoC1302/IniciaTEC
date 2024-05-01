<?php

namespace Controllers;

use Model\Campus;   
use Model\Professor;    
use Model\User; 
use MVC\Router; 
 


class ProfessorsController
{
    public static function index(Router $router)
    {
        $professors = Professor::all();

        foreach ($professors as $professor) {
            $user = User::find($professor->usuarioId);

            $professor->nombre = $user->nombre;
            $professor->apellidos = $user->apellidos;
            $professor->correo = $user->correo;
            $professor->celular = $user->celular;

            $professor->coordinador = $professor->coordinador ? 'Sí' : 'No';
        }

        $router->render('professors/index', [
            'professors' => $professors
        ]);
    }
}
