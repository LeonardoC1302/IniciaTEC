<?php

namespace Controllers;

use Model\Professor;
use Model\ProfessorXTeam;
use Model\User;

class APIProfessors {
    public static function index(){
        $teamId = $_GET['id'];
        $professors = ProfessorXTeam::all1($teamId);

        foreach($professors as $professor){
            $prfObj = Professor::where('id', $professor->profesorId);
            $user = User::find($prfObj->usuarioId);
            $professor->nombre = $user->nombre;
            $professor->apellidos = $user->apellidos;
        }

        echo json_encode($professors);
    }
}