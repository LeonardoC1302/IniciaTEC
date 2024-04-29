<?php 

namespace Model;

class Professor extends ActiveRecord{
    protected static $table = 'profesor';
    protected static $columnsDB = ['id', 'usuarioId', 'codigo', 'telefono', 'foto', 'isCoordinador'];

    public $id;
    public $usuarioId;
    public $codigo;
    public $telefono;
    public $foto;
    public $isCoordinador;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->usuarioId = $args['usuarioId'] ?? '';
        $this->codigo = $args['codigo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->foto = $args['foto'] ?? '';
        $this->isCoordinador = $args['isCoordinador'] ?? '';
    }
}