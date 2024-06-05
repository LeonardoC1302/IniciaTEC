<?php 

namespace Model;

class StudentObserver implements Observer{
    private $notificationCenter;

    public function __construct(NotificationCenter $notificationCenter){
        $this->notificationCenter = $notificationCenter;
    }

    public function update(Activity $activity): void{
        $estado = ActivityStatus::where('id', $activity->estadoId);
        if($estado) { 
            $estado = $estado->nombre;
        }
        $mensaje = "La actividad '" . $activity->nombre . "' ha sido " . $estado;
        $this->notificationCenter->createMessage("Anuncio", $mensaje, $activity->id);
    }

    public function publishUpdate(Activity $activity): void{
        $mensaje = "La actividad '" . $activity->nombre . "' ha sido Publicada";
        $this->notificationCenter->createMessage("Publicación", $mensaje, $activity->id);
    }
}