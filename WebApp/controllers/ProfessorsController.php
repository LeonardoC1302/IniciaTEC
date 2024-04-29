<?php

namespace Controllers;

use Model\Campus;   
use Model\Professor;    
use Model\User; 
use MVC\Router; 
 


class ProfessorsController
{
    public static function index(Router $router)
    {
        $router->render('professors/index');
    }

    public static function error(Router $router)
    {
        $router->render('professors/error');
    }
}
