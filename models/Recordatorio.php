<?php 

namespace Model;

class Recordatorio extends ActiveRecord{
    protected static $table = 'tipoactividad';
    protected static $columnsDB = ['id', 'descripcion', 'fecha', 'actividadId'];

    public $id;
    public $descripcion;
    public $fecha;
    public $actividadId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->actividadId = $args['actividadId'] ?? null;
    }
}