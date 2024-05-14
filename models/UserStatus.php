<?php 

namespace Model;

class UserStatus extends ActiveRecord{
    protected static $table = 'estadousuario';
    protected static $columnsDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
    }
}