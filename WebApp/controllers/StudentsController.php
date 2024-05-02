<?php

namespace Controllers;

use Classes\ExcelManager;
use Model\Campus;
use Model\Role;
use Model\Student;
use Model\User;
use Model\UserStatus;
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
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $file = $_FILES['file']['tmp_name'];
            $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

            $manager = new ExcelManager($file, $extension);
            $records = $manager->getRecords();

            if(!$records){
                $alerts['error'][] = 'Archivo no válido';
            } else {
                foreach($records as $record){
                    // LowerCase all Keys
                    $record = array_change_key_case($record, CASE_LOWER);

                    // Get the campusId
                    $campus = Campus::where('nombre', $record['campus']);
                    $record['campusId'] = $campus->id;


                    // Get the roleId
                    $rol = Role::where('nombre', 'Estudiante');
                    $record['roleId'] = $rol->id;

                    // Get the estadoId
                    $estado = UserStatus::where('nombre', 'Activo');
                    $record['estadoId'] = $estado->id;

                    // Create the user
                    $user = new User($record);
                    $user->id = null;
                    $alerts = $user->validateRegister();

                    if(empty($alerts)){
                        $user->hashPassword();
                        $result = $user->save();

                        // Create the student
                        $student = new Student([
                            'usuarioId' => $result['id'],
                            'carnet' => $record['carnet']
                        ]);
                        $student->save();
                    }
                }
                $alerts['success'][] = 'Estudiantes registrados correctamente';
            }
        }

        $router->render('students/register', [
            'alerts' => $alerts
        ]);
    }

    public static function report(Router $router){
        $campus = Campus::all();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

        }
        $router->render('students/report', [
            'campus' => $campus
        ]);
    }
}