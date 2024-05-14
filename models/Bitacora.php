<?php 

namespace Model;

class Bitacora extends ActiveRecord{
    protected static $table = 'bitacora';
    protected static $columnsDB = ['id', 'profesorId', "equipoId", "asistenteId", "fecha"];

    public $id;
    public $profesorId;
    public $equipoId;
    public $asistenteId;
    public $fecha;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->profesorId = $args['profesorId'] ?? null;
        $this->equipoId = $args['equipoId'] ?? null;
        $this->asistenteId = $args['asistenteId'] ?? null;
        $this->fecha =$args['fecha'] ?? null;
    }
}