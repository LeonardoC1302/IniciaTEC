<?php
namespace Controllers;

use MVC\Router;
use Model\Campus;   
use Model\Asistentes;   
use Model\User;   


class GuiasController {
  
    public static function asistentesAdmin(Router $router){
        $router->render('guias/asistentesAdmin');
    }

    public static function asignarAsistente(Router $router){
        $router->render('guias/asignarAsistente');
    }


}