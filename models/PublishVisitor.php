<?php 

namespace Model;

class PublishVisitor implements Visitor{
    private $currentDate;

    public function __construct($currentDate){
        $this->currentDate = $currentDate;
    }

    public function visitActivity(Activity $activity): void {
        $estado = ActivityStatus::where('id', $activity->estadoId);
        if($estado) { 
            $estado = strtolower($estado->nombre);
            // debug($activity->fechaPublicacion);
            if ($activity->fechaPublicacion <= $this->currentDate && $estado == 'planeada') {
                $activity->setEstado('Notificada');
                $activity->save();
            }
        }
    }
}