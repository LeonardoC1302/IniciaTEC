
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

$router->get('/students/register', [StudentsController::class, 'register']);
$router->post('/students/register', [StudentsController::class, 'register']);

$router->get('/students/update', [StudentsController::class, 'update']);
$router->post('/students/update', [StudentsController::class, 'update']);

$router->post('/students/delete', [StudentsController::class, 'delete']);

$router->get('/students/report', [StudentsController::class, 'report']);
$router->post('/students/report', [StudentsController::class, 'report']);

// Activities routes
$router->get('/plans', [Planscontroller::class, 'index']);

$router->get('/plans/create', [Planscontroller::class, 'create']);

$router->get('/plans/plan', [Planscontroller::class, 'plan']);
$router->get('/plans/plan/activity', [Planscontroller::class, 'activity']);

$router->get('/plan/activity/update', [Planscontroller::class, 'updateActivity']);
$router->post('/plan/activity/update', [Planscontroller::class, 'updateActivity']);

$router->get('/plan/add', [Planscontroller::class, 'add']);
$router->post('/plan/add', [Planscontroller::class, 'add']);


// Students routes
$router->get('/professors', [ProfessorsController::class, 'index']);

$router->get('/professors/register', [ProfessorsController::class, 'register']);
$router->post('/professors/register', [ProfessorsController::class, 'register']);


// Guias routes
$router->get('/guias', [GuiasController::class, 'asistentesAdmin']);
$router->get('/guias/asignar/asistente', [GuiasController::class, 'asignarAsistente']);
$router->post('/guias/asignar/asistente', [GuiasController::class, 'update']);
$router->get('/guias/crear/equipo', [GuiasController::class, 'crearEquipo']);
$router->post('/guias/crear/equipo', [GuiasController::class, 'createTeam']);
$router->get('/ver/eliminar/equipo', [GuiasController::class, 'verEliminarEquipo']);
$router->post('/team/delete', [GuiasController::class, 'deleteTeam']);




// Run the router
$router->checkRoutes();


