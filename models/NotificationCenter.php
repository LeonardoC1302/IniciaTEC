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

    public function createMessage($type, $content, $activityId = null) {
        // Lógica para crear y enviar mensajes
        // Revisar que no exista una notificación con esa actividad y ese tipo
        $reminders = Reminder::whereTwo('actividadId', $activityId, 'tipo', $type);
        if(!empty($reminders)) return;

        $reminder = new Reminder([
            "contenido" => $content,
            "fecha" => date('Y-m-d H:i:s'),
            "actividadId" => $activityId,
            "tipo" => $type
        ]);
        $reminder->save();
    }
}