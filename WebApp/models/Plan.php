<?php 

namespace Model;

class Plan extends ActiveRecord{
    protected static $table = 'plan';
    protected static $columnsDB = ['id', 'nombre', 'descripcion'];

    public $id;
    public $nombre;
    public $descripcion;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }
}