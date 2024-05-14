<?php 

namespace Model;

class ActivityType extends ActiveRecord{
    protected static $table = 'tipoactividad';
    protected static $columnsDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}