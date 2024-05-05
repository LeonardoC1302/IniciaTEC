<?php
namespace Controllers;

use Model\Activity;
use Model\ActivityStatus;
use Model\ActivityType;
use Model\Comment;
use Model\Plan;
use Model\Professor;
use Model\User;
use MVC\Router;

class Planscontroller {
    public static function index(Router $router){
        $plans = Plan::all();

        foreach($plans as $plan){
            $plan->actividades = Activity::count('planId', $plan->id);
        }

        $router->render('plans/index', [
            'plans' => $plans
        ]);
    }

    public static function plan(Router $router){
        $id = $_GET['id'] ?? null;
        if(!$id){
            header('Location: /plans');
        }

        $plan = Plan::find($id);
        if(!$plan){
            header('Location: /plans');
        }

        $activities = Activity::whereOrder('planId', $plan->id, 'fecha ASC');

        foreach($activities as $activity){
            $activity->modalidadStr = Activity::MODALIDADES[$activity->modalidad];

            $type = ActivityType::find($activity->tipoId);
            $activity->tipo = $type->nombre;

            $reponsable = Professor::find($activity->responsableId);
            $userResponsable = User::find($reponsable->usuarioId);
            $activity->responsable = $userResponsable->nombre . ' ' . $userResponsable->apellidos;
        }

        $router->render('plans/plan', [
            'plan' => $plan,
            'activities' => $activities
        ]);
    }

    public static function activity(Router $router){
        $planId = $_GET['plan'] ?? null;
        $activityId = $_GET['id'] ?? null;

        $activity = Activity::find($activityId);

        $activity->modalidadStr = Activity::MODALIDADES[$activity->modalidad];

        $type = ActivityType::find($activity->tipoId);
        $activity->tipo = $type->nombre;

        $reponsable = Professor::find($activity->responsableId);
        $userResponsable = User::find($reponsable->usuarioId);
        $activity->responsable = $userResponsable->nombre . ' ' . $userResponsable->apellidos;

        $estado = ActivityStatus::find($activity->estadoId);
        $activity->estado = $estado->nombre;
        
        $comments = Comment::whereNull('actividadId', $activityId, 'comentarioId');
        
        foreach($comments as $comment){
            $professor = Professor::find($comment->profesorId);
            $user = User::find($professor->usuarioId);
            $comment->profesor = $user->nombre . ' ' . $user->apellidos;

            $comment->subcomments = Comment::whereAll('comentarioId', $comment->id);

            foreach($comment->subcomments as $subcomment){
                $professor = Professor::find($subcomment->profesorId);
                $user = User::find($professor->usuarioId);
                $subcomment->profesor = $user->nombre . ' ' . $user->apellidos;
            }
        }

        $router->render('plans/activity', [
            'planId' => $planId,
            'activity' => $activity,
            'comments' => $comments
        ]);
    }

    public static function create(Router $router){
        $alerts = [];
        $plan = new Plan();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $plan->sync($_POST);
            $alerts = $plan->validate();
            
            if(empty($alerts)){
                $plan->save();
                header('Location: /plans');
            }
        }

        $router->render('plans/create', [
            'alerts' => $alerts,
            'plan' => $plan
        ]);
    }

    public static function add(Router $router){
        $planId = $_GET['plan'] ?? null;
        $alerts = [];
        $types = ActivityType::all();
        $modalities = Activity::MODALIDADES;

        $professors = Professor::all();
        $professors = array_map(function($professor){
            $user = User::find($professor->usuarioId);
            $professor->nombre = $user->nombre . ' ' . $user->apellidos;
            return $professor;
        }, $professors);

        $activity = new Activity();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $activity->sync($_POST);
 
            $estado = ActivityStatus::where('nombre', 'Planeada');
            $activity->estadoId = $estado->id;
            $activity->planId = $planId;

            // Guardar el afiche (PDF)
            $file = $_FILES['afiche'];
            $fileName = $file['name'];

            if($fileName){
                $activity->afiche = $fileName;
            }
            $alerts = $activity->validate();

            if(empty($alerts)){
                $activity->save();
                header('Location: /plans/plan?id=' . $planId);
            }
        }

        $router->render('plans/add', [
            'planId' => $planId,
            'types' => $types,
            'modalities' => $modalities,
            'professors' => $professors,
            'activity' => $activity,
            'alerts' => $alerts
        ]);
    }

    public static function updateActivity(Router $router){
        $planId = $_GET['plan'] ?? null;
        $alerts = [];
        $types = ActivityType::all();
        $modalities = Activity::MODALIDADES;

        $professors = Professor::all();
        $professors = array_map(function($professor){
            $user = User::find($professor->usuarioId);
            $professor->nombre = $user->nombre . ' ' . $user->apellidos;
            return $professor;
        }, $professors);

        $states = ActivityStatus::all();

        $activity = Activity::find($_GET['id']);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debug($_POST);
            $activity->sync($_POST);
            $activity->planId = $planId;

            // Guardar el afiche (PDF)
            $file = $_FILES['afiche'];
            $fileName = $file['name'];

            if($fileName){
                $activity->afiche = $fileName;
            }

            if($_POST['estadoId'] == 3){
                $fileName = $_FILES['evidencias']['name'];
                $activity->evidencias = $fileName;
            } else if($_POST['estadoId'] == 4){
                $activity->justificacion = $_POST['justificacion'];
            }
            $alerts = $activity->validateUpdate();

            if(empty($alerts)){
                $activity->update();
                header('Location: /plans/plan/activity?id=' . $activity->id);
            }

            // debug($alerts);
        }

        $router->render('plans/update',[
            'planId' => $planId,
            'types' => $types,
            'modalities' => $modalities,
            'professors' => $professors,
            'activity' => $activity,
            'states' => $states,
            'alerts' => $alerts
        ]);
    }

    public static function delete(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            if(!$id){
                header('Location: /plans');
            }
            $plan = Plan::find($id);

            // Delete all activities from the plan
            $activities = Activity::whereAll('planId', $id);
            foreach($activities as $activity){
                $activity->delete();
            }

            // Delete the plan
            $plan->delete();

            header('Location: /plans');
        }
    }

    public static function comment(Router $router){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!isset($_SESSION)){
                session_start();
            }
            $professor = Professor::where('usuarioId', $_SESSION['id']);
            if(!$professor){
                header('Location: /');
            }
            $comment = new Comment($_POST);
            $alerts = $comment->validate();

            if(empty($alerts)){
                $comment->profesorId = $professor->id;
                $comment->fecha = date('Y-m-d H:i:s');
                $comment->save();
                header('Location: /plans/plan/activity?id=' . $comment->actividadId) . '&plan=' . $_POST['planId'];
            } 
        }
    }
}