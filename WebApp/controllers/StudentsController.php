<?php

namespace Controllers;

use Classes\ExcelManager;
use Model\Campus;
use Model\Role;
use Model\Student;
use Model\User;
use Model\UserStatus;
use MVC\Router;
use League\Csv\Writer;
use League\Csv\Reader;
use SplTempFileObject;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class StudentsController
{
    public static function index(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            //debug($_POST);
            $students = Student::all();
            foreach($students as $student){
                $user = User::where('id', $student->usuarioId);
                $campus = Campus::where('id', $user->campusId);

                $student->nombre = $user->nombre;
                $student->apellidos = $user->apellidos;
                $student->campus = $campus->nombre;
            }
            /*
            if($_POST['filtro'] === "carnet"){
                usort($students, 'sortByCarnetAsc');
            }else{
                usort($students, 'sortBySurnameAsc');
            }
            */
          
        }else{
            $students = Student::all();
            foreach($students as $student){
                $user = User::where('id', $student->usuarioId);
                $campus = Campus::where('id', $user->campusId);

                $student->nombre = $user->nombre;
                $student->apellidos = $user->apellidos;
                $student->campus = $campus->nombre;
            }
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
        $alerts = [];
        $campus = Campus::all();
        $students = Student::all();
        $rolEstudiante = Role::where('nombre', 'Estudiante');
        $data = array();
        $header = array('Nombre', 'Apellidos', 'Correo', 'Contrasenna', 'Celular', 'Campus', 'Carnet');
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if($_POST['options'] === '1'){
                if(!isset($_POST['campus'])){
                    $alerts['error'][] = 'Seleccione un campus';
                } else{
                    $user = User::whereTwo('campusId', $_POST['campus'], 'roleId', $rolEstudiante->id);
                    $campusName = Campus::where('id', $_POST['campus']);
                    $campusName = $campusName->nombre;
                    foreach($user as $u){
                        $student = Student::where('usuarioId', $u->id);
                        array_push($data, [$u->nombre, $u->apellidos, $u->correo, $u->contrasenna, $u->celular, $campusName, $student->carnet]); 
                    }
                    $csv = Writer::createFromFileObject(new SplTempFileObject());
                    $csv->insertOne($header);
                    $csv->insertAll($data);
    
                    while (ob_get_level()) {
                        ob_end_clean();
                    }
                    ob_start();
    
                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment; filename=$campusName . "-Estudiantes.csv"');
                    header('Cache-Control: max-age=0');
    
                    $csv->output($campusName . '-Estudiantes.csv');
    
                    ob_end_flush();
                    exit;
                }
            }else{
                $spreadsheet = new Spreadsheet();
                $num = 1;
                foreach($campus as $c){
                    $data = array();
                    array_push($data, $header);
                    $user = User::whereTwo('campusId', $c->id, 'roleId', $rolEstudiante->id);
                    foreach($user as $u){
                        $student = Student::where('usuarioId', $u->id);
                        array_push($data, [$u->nombre, $u->apellidos, $u->correo, $u->contrasenna, $u->celular, $c->nombre, $student->carnet]);
                    }
                    if($num == 1){
                        $sheet = $spreadsheet->getActiveSheet();
                        $num = $num + 1;
                    }else{  
                        $sheet = $spreadsheet->createSheet();
                    }
                    $sheet->setTitle($c->nombre);
                    $sheet->fromArray($data, null,'A1');
                }
                $writer = new Xlsx($spreadsheet);
                while (ob_get_level()) {
                    ob_end_clean();
                }
                ob_start();
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="EstudiantesXCampus.xlsx"');
                header('Cache-Control: max-age=0');
                $writer->save('php://output');
                ob_end_flush();
                exit;
            }
        }
        $router->render('students/report', [
            'alerts' => $alerts,
            'campus' => $campus
        ]);
    }
}

//Falta: Poder ordenar a los estudiantes en orden alfabetico o por carnet (Seleccionar orden) 
//Validacion de editar estudiantes. Solo si pertenece a la misma sede
?>