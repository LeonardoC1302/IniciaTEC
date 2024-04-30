
<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\AuthController;
use MVC\Router;
use Controllers\PagesController;
use Controllers\Planscontroller;
use Controllers\ProfessorsController; 
use Controllers\StudentsController; 
use Controllers\GuiasController; 


$router = new Router();


// Define routes
$router->get('/', [PagesController::class, 'index']);
$router->get('/404', [PagesController::class, 'error']);

// Auth routes
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);

$router->post('/logout', [AuthController::class, 'logout']);

$router->get('/recover', [AuthController::class, 'recover']);
$router->post('/recover', [AuthController::class, 'recover']);

$router->get('/reset', [AuthController::class, 'reset']);
$router->post('/reset', [AuthController::class, 'reset']);

$router->get('/message', [AuthController::class, 'message']);
$router->get('/account', [AuthController::class, 'account']);

// Students routes
$router->get('/students', [StudentsController::class, 'index']);

$router->get('/students/update', [StudentsController::class, 'update']);
$router->post('/students/update', [StudentsController::class, 'update']);

$router->post('/students/delete', [StudentsController::class, 'delete']);

// Activities routes
$router->get('/plans', [Planscontroller::class, 'index']);
$router->get('/plans/plan', [Planscontroller::class, 'plan']);
$router->get('/plans/plan/activity', [Planscontroller::class, 'activity']);

// Students routes
$router->get('/professors', [ProfessorsController::class, 'index']);

// Guias routes
$router->get('/guias', [GuiasController::class, 'asistentesAdmin']);


// Run the router
$router->checkRoutes();
