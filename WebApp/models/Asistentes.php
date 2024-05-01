<?php 

namespace Model;

class Asistentes extends ActiveRecord{
    protected static $table = 'asistente';
    protected static $columnsDB = ['id', 'usuarioId'];

    public $id;
    public $usuarioId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? '';
    }
}