<?php

use Model\Professor;

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function isAuth() : bool {
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION['id']) && !empty($_SESSION);
}

function isStudent(){
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION['rol']) && ($_SESSION['rol'] === 'estudiante');
}

function isTeacher(){
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION['rol']) && ($_SESSION['rol'] === 'profesor');
}

function isCoordinator(){
    if(!isset($_SESSION)){
        session_start();
    }
    $professor = Professor::where('usuarioId', $_SESSION['id']);
    if(!$professor){
        return false;
    }
    return isset($_SESSION['rol']) && ($professor->isCoordinador);
}

function isAssistant(){
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION['rol']) && ($_SESSION['rol'] === 'asistente administrativo');
}

function isAssistantCartago(){
    if(!isset($_SESSION)){
        session_start();
    }
    return isset($_SESSION['rol']) && ($_SESSION['rol'] === 'asistente administrativo') && ($_SESSION['campus'] === 'ca');
}