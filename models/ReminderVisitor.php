<?php 

namespace Model;

use DateTime;

class ReminderVisitor implements Visitor{
    private $currentDate;
    private $notificationCenter;

    public function __construct($currentDate, NotificationCenter $notificationCenter){
        $this->currentDate = $currentDate;
        $this->notificationCenter = $notificationCenter;
    }

    public function visitActivity(Activity $activity): void {
        $estado = ActivityStatus::where('id', $activity->estadoId);
        if($estado) { 
            $estado = strtolower($estado->nombre);
            if ($estado == 'notificada') {
                // Formatear fechas
                $activity->fechaPublicacion = date('Y-m-d', strtotime($activity->fechaPublicacion));
                $this->currentDate = date('Y-m-d', strtotime($this->currentDate));
                
                // Variables importantes
                $publicationDate = new DateTime($activity->fechaPublicacion);
                $currentDate = new DateTime($this->currentDate);
                $diasRecordatorio = $activity->diasRecordatorio;

                // Calcular diferencia de días
                $diff = $publicationDate->diff($currentDate)->days;
                
                // Si hay que notficar o no
                if($diff % $diasRecordatorio == 0){
                    $this->notificationCenter->notify($activity);
                }

            } elseif($estado == 'cancelada'){
                $this->notificationCenter->createMessage("Cancelación", "La actividad '" . $activity->nombre . "' ha sido cancelada", $activity->id, $this->currentDate);
            }
        }
    }
}