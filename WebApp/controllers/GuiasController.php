<?php
namespace Controllers;


use Model\Campus;   
use Model\Asistentes;   
use Model\User; 
use MVC\Router;  


class GuiasController {
  
    public static function asistentesAdmin(Router $router){
        $router->render('guias/asistentesAdmin');
    }

    public static function asignarAsistente(Router $router){
        $router->render('guias/asignarAsistente');
    }
    
    public static function update(Router $router){
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $campus_id = $_POST["campus"];
        
            if ($campus_id) {
                
                $usuarioId = $_POST["asistente"];
        
                // Realizar la actualización en la base de datos
                $query = "UPDATE usuario SET campusId = $campus_id WHERE id = $usuarioId";
                Asistentes::update2($query);
                header('Location: /guias');

            } else {
                // Manejar el caso en el que no se encuentre el campus
                echo "El campus seleccionado no fue encontrado.";
            }
        }
    }
    
    

}