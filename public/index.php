
<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\APIProfessors;
use Controllers\AuthController;
use MVC\Router;
use Controllers\PagesController;
use Controllers\PlansController;
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
$router->post('/students', [StudentsController::class, 'index']);

$router->get('/students/register', [StudentsController::class, 'register']);
$router->post('/students/register', [StudentsController::class, 'register']);

$router->get('/students/update', [StudentsController::class, 'update']);
$router->post('/students/update', [StudentsController::class, 'update']);

$router->post('/students/delete', [StudentsController::class, 'delete']);

$router->get('/students/report', [StudentsController::class, 'report']);
$router->post('/students/report', [StudentsController::class, 'report']);

// Activities routes
$router->get('/plans', [PlansController::class, 'index']);

$router->get('/plans/create', [PlansController::class, 'create']);
$router->post('/plans/create', [PlansController::class, 'create']);

$router->get('/plans/plan', [PlansController::class, 'plan']);

$router->get('/plans/plan/activity', [PlansController::class, 'activity']);

$router->get('/plan/activity/update', [PlansController::class, 'updateActivity']);
$router->post('/plan/activity/update', [PlansController::class, 'updateActivity']);

$router->post('/plans/activity/comment', [PlansController::class, 'comment']);

$router->get('/plan/add', [PlansController::class, 'add']);
$router->post('/plan/add', [PlansController::class, 'add']);

$router->post('/plans/delete', [PlansController::class, 'delete']);


// Students routes
$router->get('/professors', [ProfessorsController::class, 'index']);

$router->get('/professors/register', [ProfessorsController::class, 'register']);
$router->post('/professors/register', [ProfessorsController::class, 'register']);

$router->get('/professors/coordinator', [ProfessorsController::class, 'coordinator']);
$router->post('/professors/coordinator', [ProfessorsController::class, 'coordinator']);

$router->get('/api/professors', [APIProfessors::class, 'index']);

$router->get('/activities', [StudentsController::class, 'activities']);
$router->get('/notificaciones', [StudentsController::class, 'notifications']);

// Guias routes
$router->get('/guias', [GuiasController::class, 'asistentesAdmin']);
$router->get('/guias/asignar/asistente', [GuiasController::class, 'asignarAsistente']);
$router->post('/guias/asignar/asistente', [GuiasController::class, 'update']);
$router->get('/guias/crear/equipo', [GuiasController::class, 'crearEquipo']);
$router->post('/guias/crear/equipo', [GuiasController::class, 'createTeam']);
$router->get('/ver/eliminar/equipo', [GuiasController::class, 'verEliminarEquipo']);
$router->post('/editar/equipo/trabajo', [GuiasController::class, 'deleteTeam']);
$router->get('/ver/equipo/trabajo', [GuiasController::class, 'verEquipo']);
$router->get('/editar/equipo/trabajo', [GuiasController::class, 'editarEquipo']);
$router->get('/agregar/profesor', [GuiasController::class, 'editarEquipo']);
$router->post('/add/equipo/trabajo', [GuiasController::class, 'addTeam']);
$router->post('/anno/equipo', [GuiasController::class, 'editYearTeam']);
$router->post('/edit/equipo/trabajo', [GuiasController::class, 'editTeam']);
$router->post('/guias/actualizar/equipo', [GuiasController::class, 'addTeam2']);
$router->get('/guias/register-asistente', [GuiasController::class, 'registerasistente']);
$router->post('/guias/register-asistente', [GuiasController::class, 'registerasistente']);



// Run the router
$router->checkRoutes();
