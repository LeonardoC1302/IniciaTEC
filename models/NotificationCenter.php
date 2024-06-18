<?php 

namespace Model;

class NotificationCenter implements Subject{
    public $observers = [];

    public function attach(Observer $observer): void {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer): void {
        $this->observers = array_filter($this->observers, function($obs) use ($observer) {
            return $obs !== $observer;
        });
    }

    public function notify(Activity $activity): void {
        foreach ($this->observers as $observer) {
            $observer->update($activity);
        }
    }

    public function publish(Activity $activity): void {
        foreach ($this->observers as $observer) {
            $observer->publishUpdate($activity);
        }
        
    }

    public function createMessage($type, $content, $activityId = null, $fecha) {
        // Lógica para crear y enviar mensajes
        // Revisar que no exista una notificación con esa actividad y ese tipo
        $activity = Activity::where('id', $activityId);
        $reminders = Reminder::whereTwo('actividadId', $activityId, 'tipo', $type);

        if(!empty($reminders)){
            // si la actividad está cancelada (estadoId = 4), se hace return
            if($activity->estadoId == 4){
                return;
            }

            // Ver si ya hay uno con $fecha, si hay hacer return
            foreach($reminders as $reminder){
                $reminderDate = date($reminder->fecha);
                // Comparar unicamente el día, mes y año, no el tiempo
                if(date('Y-m-d', strtotime($reminderDate)) == date('Y-m-d', strtotime($fecha))){
                    return;
                }
            }
        };

        $reminder = new Reminder([
            "contenido" => $content,
            "fecha" => $fecha,
            "actividadId" => $activityId,
            "tipo" => $type
        ]);
        $reminder->save();
    }
}