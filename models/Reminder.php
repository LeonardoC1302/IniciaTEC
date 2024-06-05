<?php 

namespace Model;

class Reminder extends ActiveRecord{
    protected static $table = 'recordatorio';
    protected static $columnsDB = ['id', 'contenido', 'fecha', 'actividadId', 'tipo'];

    public $id;
    public $contenido;
    public $fecha;
    public $actividadId;
    public $tipo;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->contenido = $args['contenido'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->actividadId = $args['actividadId'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
    }
}