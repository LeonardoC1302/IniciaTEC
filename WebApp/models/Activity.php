<?php 

namespace Model;

class Activity extends ActiveRecord{
    protected static $table = 'actividad';
    protected static $columnsDB = ['id', 'nombre', 'fecha', 'semana', 'descripcion', 'tipoId', 'responsableId', 'fechaPublicacion', 'modalidad', 'enlace', 'afiche', 'estadoId', 'planId'];

    public $id;
    public $nombre;
    public $fecha;
    public $semana;
    public $descripcion;
    public $tipoId;
    public $responsableId;
    public $fechaPublicacion;
    public $modalidad;
    public $enlace;
    public $afiche;
    public $estadoId;
    public $planId;

    public const MODALIDADES = [
        1 => 'Presencial',
        2 => 'Virtual',
        3 => 'Mixta'
    ];

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->semana = $args['semana'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->tipoId = $args['tipoId'] ?? null;
        $this->responsableId = $args['responsableId'] ?? null;
        $this->fechaPublicacion = $args['fechaPublicacion'] ?? '';
        $this->modalidad = $args['modalidad'] ?? '';
        $this->enlace = $args['enlace'] ?? '';
        $this->afiche = $args['afiche'] ?? '';
        $this->estadoId = $args['estadoId'] ?? null;
        $this->planId = $args['planId'] ?? null;
    }
}