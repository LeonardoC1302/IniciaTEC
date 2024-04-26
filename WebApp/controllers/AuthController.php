<?php
namespace Controllers;

use MVC\Router;

class AuthController {
    public static function login(Router $router){
        $router->render('auth/login');
    }

    public static function recover(Router $router){
        $router->render('auth/recover');
    }

    public static function message(Router $router){
        $router->render('auth/message');
    }

    public static function account(Router $router){
        $router->render('auth/account');
    }
}