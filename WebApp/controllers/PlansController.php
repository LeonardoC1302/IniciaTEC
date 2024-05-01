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

    
}