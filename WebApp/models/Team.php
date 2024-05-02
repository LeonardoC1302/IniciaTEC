<?php 

namespace Model;

class Team extends ActiveRecord{
    protected static $table = 'equipo';
    protected static $columnsDB = ['id', 'nombre', 'planId'];

    public $id;
    public $planId;
    public $nombre;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre =$arg['nombre'] ?? NULL;
        $this->planId = $args['planId'];
    }

}