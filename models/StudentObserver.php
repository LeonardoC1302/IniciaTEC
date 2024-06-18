<?php 

namespace Model;

class StudentObserver implements Observer{
    private $notificationCenter;
    private $date;

    public function __construct(NotificationCenter $notificationCenter, $date){
        $this->notificationCenter = $notificationCenter;
        $this->date = $date;
    }

    public function update(Activity $activity): void{
        $estado = ActivityStatus::where('id', $activity->estadoId);
        if($estado) { 
            $estado = $estado->nombre;
        }
        $mensaje = "La actividad '" . $activity->nombre . "' ha sido " . $estado;
        $this->notificationCenter->createMessage("Anuncio", $mensaje, $activity->id, $this->date);
    }

    public function publishUpdate(Activity $activity): void{
        $mensaje = "La actividad '" . $activity->nombre . "' ha sido Publicada";
        $this->notificationCenter->createMessage("Publicación", $mensaje, $activity->id, $this->date);
    }
}