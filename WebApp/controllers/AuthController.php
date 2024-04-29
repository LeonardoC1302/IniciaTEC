<?php
namespace Controllers;

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
        $router->render('auth/recover');
    }

    public static function message(Router $router){
        $router->render('auth/message');
    }

    public static function account(Router $router){
        if(!isset($_SESSION)){
            session_start();
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
}