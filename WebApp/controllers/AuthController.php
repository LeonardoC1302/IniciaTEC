<?php
namespace Controllers;

use Classes\Email;
use Model\Campus;
use Model\Role;
use Model\User;
use MVC\Router;

class AuthController {
    public static function login(Router $router){
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user = new User($_POST);
            $alerts = $user->validateLogin();
            if(empty($alerts)){
                $user = User::where('correo', $user->correo);
                if(!$user){
                    User::setAlert('error', 'El usuario no existe');
                } else{
                    // $user->hashPassword();
                    // $user->save();
                    if(password_verify($_POST['contrasenna'], $user->contrasenna)){
                        session_start();
                        $_SESSION['id'] = $user->id;
                        $_SESSION['nombre'] = $user->nombre;
                        $_SESSION['apellidos'] = $user->apellidos;
                        $_SESSION['correo'] = $user->correo;
                        $_SESSION['roleId'] = $user->roleId;

                        // Nombre del rol
                        $role = Role::find($user->roleId);
                        $_SESSION['rol'] = strtolower($role->nombre);

                        // Nombre del campus
                        $campus = Campus::find($user->campusId);
                        $_SESSION['campus'] = strtolower($campus->nombre);

                        // Cambiar dependiendo del rol
                        header('Location: /');
                    } else{
                        User::setAlert('error', 'La contraseña es incorrecta');
                    }
                }
            }
        }
        $alerts = user::getalerts();
        $router->render('auth/login',[
            'alerts' => $alerts
        ]);
    }

    public static function recover(Router $router){
        $alerts = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user = new User($_POST);
            $alerts = $user->validateEmail();

            if(empty($alerts)){
                $user = User::where('correo', $user->correo);
                if($user){
                    $user->createToken();
                    $user->save();

                    $email = new Email($user->correo, $user->nombre, $user->token);
                    $email->sendInstructions();
                    header('Location: /message');
                } else{
                    $alerts['error'][] = 'El usuario no existe';
                }
            }
        }

        $router->render('auth/recover', [
            'alerts' => $alerts
        ]);
    }

    public static function message(Router $router){
        $router->render('auth/message');
    }

    public static function account(Router $router){
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION['id'])){
            header('Location: /');
        }
        
        $user = User::find($_SESSION['id']);
        if(!$user){
            header('Location: /');
        }
        $role = Role::find($user->roleId);
        $user->rol = $role->nombre;

        $router->render('auth/account',[
            'user' => $user
        ]);
    }

    public static function logout() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
       
    }

    public static function reset(Router $router){
        $token = $_GET['token'];
        $validToken = true;

        if(!$token) header('Location: /');
        $user = User::where('token', $token);

        if(empty($user)){
            User::setAlert('error', 'Token no válido, inténtalo de nuevo');
            $validToken = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $user->sync($_POST);
            $alerts = $user->validatePassword();

            if(empty($alerts)){
                $user->hashPassword();
                $user->token = null;
                $result = $user->save();

                if($result) {
                    header('Location: /login');
                }
            }

        }

        $alerts = User::getAlerts();
        $router->render('auth/reset', [
            'alerts' => $alerts,
            'validToken' => $validToken
        ]);
    }
}