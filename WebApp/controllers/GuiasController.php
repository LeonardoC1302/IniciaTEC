<?php
namespace Controllers;

use MVC\Router;

class GuiasController {
  
    public static function asistentesAdmin(Router $router){
        $router->render('guias/asistentesAdmin');
    }


}