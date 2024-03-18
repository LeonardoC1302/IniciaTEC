
<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PagesController;

$router = new Router();


// Define routes
$router->get('/', [PagesController::class, 'index']);

$router->checkRoutes();