<?php 

namespace Model;

class Evidence extends ActiveRecord{
    protected static $table = 'evidencia';
    protected static $columnsDB = ['id', 'contenido', 'actividadId'];

    public $id;
    public $contenido;
    public $actividadId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->contenido = $args['contenido'] ?? '';
        $this->actividadId = $args['actividadId'] ?? null;
    }
}