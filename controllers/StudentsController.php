<?php

namespace Controllers;

use MVC\Router;

class StudentsController
{
    public static function index(Router $router)
    {
        $router->render('students/index');
    }
}