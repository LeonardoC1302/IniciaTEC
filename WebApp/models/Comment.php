<?php 

namespace Model;

class Comment extends ActiveRecord{
    protected static $table = 'comentario';
    protected static $columnsDB = ['id', 'contenido', 'fecha', 'actividadId', 'comentarioId', 'profesorId'];

    public $id;
    public $contenido;
    public $fecha;
    public $actividadId;
    public $comentarioId;
    public $profesorId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->actividadId = $args['actividadId'] ?? '';
        $this->comentarioId = $args['comentarioId'] ?? '';
        $this->profesorId = $args['profesorId'] ?? '';
    }
}