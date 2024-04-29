<?php 

namespace Model;

class ActivityStatus extends ActiveRecord{
    protected static $table = 'estadoactividad';
    protected static $columnsDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
    }
}