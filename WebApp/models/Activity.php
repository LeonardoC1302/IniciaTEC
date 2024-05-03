<?php 

namespace Model;

class Activity extends ActiveRecord{
    protected static $table = 'actividad';
    protected static $columnsDB = ['id', 'nombre', 'fecha', 'semana', 'descripcion', 'tipoId', 'responsableId', 'fechaPublicacion', 'modalidad', 'enlace', 'afiche', 'estadoId', 'planId', 'diasRecordatorio', 'diasAnuncio'];

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
    public $diasRecordatorio;
    public $diasAnuncio;

    public const MODALIDADES = [
        1 => 'Presencial',
        2 => 'Virtual'
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
        $this->diasRecordatorio = $args['diasRecordatorio'] ?? '';
        $this->diasAnuncio = $args['diasAnuncio'] ?? '';
    }

    public function validate(){
        if(!$this->nombre){
            self::setAlert('error', 'El nombre es obligatorio');
        }

        if(!$this->fecha){
            self::setAlert('error', 'La fecha es obligatoria');
        }

        if(!$this->semana){
            self::setAlert('error', 'La semana es obligatoria');
        }

        if(!$this->descripcion){
            self::setAlert('error', 'La descripción es obligatoria');
        }

        if(!$this->tipoId){
            self::setAlert('error', 'El tipo es obligatorio');
        }

        if(!$this->responsableId){
            self::setAlert('error', 'El responsable es obligatorio');
        }

        if(!$this->fechaPublicacion){
            self::setAlert('error', 'La fecha de publicación es obligatoria');
        }

        if($this->fecha && $this->fechaPublicacion && ($this->fecha < $this->fechaPublicacion)){
            self::setAlert('error', 'La fecha de publicación debe ser menor a la fecha de realización');
        }

        if(!$this->modalidad){
            self::setAlert('error', 'La modalidad es obligatoria');
        } else if($this->modalidad == "2" && !$this->enlace){
            self::setAlert('error', 'El enlace es obligatorio para actividades virtuales');
        }

        if(!$this->afiche){
            self::setAlert('error', 'El afiche es obligatorio');
        }

        if(!$this->estadoId){
            self::setAlert('error', 'El estado es obligatorio');
        }

        if(!$this->planId){
            self::setAlert('error', 'El plan es obligatorio');
        }

        if(!$this->diasRecordatorio){
            self::setAlert('error', 'Los días para recordatorio son obligatorios');
        }

        if(!$this->diasAnuncio){
            self::setAlert('error', 'Los días para anunciar son obligatorios');
        }


        return self::$alerts;
    }

    public function validateUpdate(){
        if(!$this->nombre){
            self::setAlert('error', 'El nombre es obligatorio');
        }

        if(!$this->fecha){
            self::setAlert('error', 'La fecha es obligatoria');
        }

        if(!$this->semana){
            self::setAlert('error', 'La semana es obligatoria');
        }

        if(!$this->descripcion){
            self::setAlert('error', 'La descripción es obligatoria');
        }

        if(!$this->tipoId){
            self::setAlert('error', 'El tipo es obligatorio');
        }

        if(!$this->responsableId){
            self::setAlert('error', 'El responsable es obligatorio');
        }

        if(!$this->fechaPublicacion){
            self::setAlert('error', 'La fecha de publicación es obligatoria');
        }

        if($this->fecha && $this->fechaPublicacion && ($this->fecha < $this->fechaPublicacion)){
            self::setAlert('error', 'La fecha de publicación debe ser menor a la fecha de realización');
        }

        if(!$this->modalidad){
            self::setAlert('error', 'La modalidad es obligatoria');
        } else if($this->modalidad == "2" && !$this->enlace){
            self::setAlert('error', 'El enlace es obligatorio para actividades virtuales');
        }

        if(!$this->estadoId){
            self::setAlert('error', 'El estado es obligatorio');
        }

        if(!$this->planId){
            self::setAlert('error', 'El plan es obligatorio');
        }

        if(!$this->diasRecordatorio){
            self::setAlert('error', 'Los días para recordatorio son obligatorios');
        }

        if(!$this->diasAnuncio){
            self::setAlert('error', 'Los días para anunciar son obligatorios');
        }
        
        if($this->estadoId == 4 && !$this->justificacion){
            self::setAlert('error', 'La justificación es obligatoria para actividades canceladas');
        } else if($this->estadoId == 3 && !$this->evidencias){
            self::setAlert('error', 'Las evidencias son obligatorias para actividades realizadas');
        }

        return self::$alerts;
    }
}