<?php

namespace Controllers;

use Classes\Email;
use Model\Campus;   
use Model\Professor;    
use Model\User; 
use MVC\Router; 
use Intervention\Image\ImageManagerStatic as Image;
use Model\ProfessorXTeam;
use Model\Role;
use Model\Team;
use Model\UserStatus;

class ProfessorsController
{
    public static function index(Router $router)
    {
        if(!isAssistant() && !isAdmin()) {
            header('Location: /');
        }
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

        $router->render('professors/index', [
            'professors' => $professors
        ]);
    }

    public static function register(Router $router)
    {
        $alerts = [];

        $professor = new Professor();
        $professor->codigo = '';
        $professor->nombre = '';
        $professor->apellidos = '';
        $professor->correo = '';
        $professor->telefono = '';
        $professor->celular = '';
        $professor->foto = '';
        $professor->campusId = '';

        $campus = Campus::all();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!empty($_FILES['foto']['tmp_name'])){
                // Creamos el folder para guardar las imágenes
                $image_folder = '../public/img/professors';
                if(!is_dir($image_folder)) {
                    mkdir($image_folder, 0775, true);
                }

                // Creamos las imágenes
                $image_png = Image::make($_FILES['foto']['tmp_name'])->fit(800, 680)->encode('png', 80);
                $image_webp = Image::make($_FILES['foto']['tmp_name'])->fit(800, 680)->encode('webp', 80);

                // Creamos el nombre de la imagen
                $image_name = md5(uniqid(rand(), true));

                $_POST['foto'] = $image_name;
            }
            $professor->sync($_POST);
            
            $alerts = $professor->validateRegister();
            // debug($alerts);

            if(empty($alerts)){
                $user = new User($_POST);
                $user->generatePassword();

                $email = new Email($user->correo, $user->nombre, $user->token, $user->contrasenna);
                $email->sendPassword();

                $user->hashPassword();

                $userStatus = UserStatus::where('nombre', 'Activo');
                $user->estadoId = $userStatus->id;

                $role = Role::where('nombre', 'Profesor');
                $user->roleId = $role->id;

                $result = $user->save();

                $professor->usuarioId = $result['id'];
                $professor->isCoordinador = 0;

                $image_png->save($image_folder . '/' . $image_name . '.png');
                $image_webp->save($image_folder . '/' . $image_name . '.webp');


                $result = $professor->save();
                if($result) {
                    header('Location: /professors');
                }
            }
        }

        $router->render('professors/register', [
            'campus' => $campus,
            'professor' => $professor,
            'alerts' => $alerts
        ]);
    }

    public static function coordinator(Router $router)
    {
        if(!isAssistantCartago() && !isAdmin()) {
            header('Location: /');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $teamId = $_POST['teamId'];
            $profId = $_POST['profId'];
            if(!$teamId || !$profId) {
                header('Location: /professors/coordinator');
            }

            $team = Team::find($teamId);
            $professor = Professor::find($profId);
            if(!$team || !$professor) {
                header('Location: /professors/coordinator');
            }

            // Set all professors from the team to not be coordinators except the selected one
            $professorsXTeam = ProfessorXTeam::all1($teamId);
            foreach ($professorsXTeam as $profXTeam) {
                $professor = Professor::find($profXTeam->profesorId);

                if($profXTeam->profesorId == $profId) {
                    $professor->isCoordinador = 1;
                } else {
                    $professor->isCoordinador = 0;
                }
                $professor->save();
            }

            header('Location: /professors');

        }

        $teams = Team::all();
        $teams = array_reverse($teams);
        $router->render('professors/coordinator', [
            'teams' => $teams
        ]);
    }
    
}
