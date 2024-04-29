<?php 

namespace Model;

class Role extends ActiveRecord{
    protected static $table = 'rol';
    protected static $columnsDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
    }
}