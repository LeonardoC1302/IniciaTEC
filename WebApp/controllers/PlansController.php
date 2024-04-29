<?php
namespace Controllers;

use Model\Activity;
use Model\ActivityType;
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
}