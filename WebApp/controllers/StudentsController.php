<?php

namespace Controllers;

use Model\Campus;
use Model\Student;
use Model\User;
use MVC\Router;

class StudentsController
{
    public static function index(Router $router)
    {
        $students = Student::all();
        foreach($students as $student){
            $user = User::where('id', $student->usuarioId);
            $campus = Campus::where('id', $user->campusId);

            $student->nombre = $user->nombre;
            $student->apellidos = $user->apellidos;
            $student->campus = $campus->nombre;

        }

        $router->render('students/index', [
            'students' => $students
        ]);
    }

    public static function update(Router $router){
        $alerts = [];

        $id = $_GET['id'];
        if(!$id){
            header('Location: /students');
        }

        $student = Student::find($id);
        if(!$student){
            header('Location: /students');
        }

        $user = User::where('id', $student->usuarioId);
        $campus = Campus::where('id', $user->campusId);

        $student->nombre = $user->nombre;
        $student->apellidos = $user->apellidos;
        $student->campus = $campus->nombre;
        $student->correo = $user->correo;
        $student->celular = $user->celular;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $student->sync($_POST);
            $alerts = $student->validateUpdate();
            if(empty($alerts)){
                $result = $student->save();
                if($result){
                    // Change the user data
                    $user->nombre = $student->nombre;
                    $user->apellidos = $student->apellidos;
                    $user->correo = $student->correo;
                    $user->celular = $student->celular;
                    $user->save();

                    header('Location: /students');
                }
            }
        }


        $router->render('students/update', [
            'alerts' => $alerts,
            'student' => $student
        ]);
    }

    public static function delete(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $student = Student::find($id);
                if(isset($student)){
                    $user = User::where('id', $student->usuarioId);
                    $student->delete();
                    $user->delete();
                }
            }
        }
        header('Location: /students');
    }

    public static function register(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            debug($_FILES);
        }

        $router->render('students/register');
    }
}