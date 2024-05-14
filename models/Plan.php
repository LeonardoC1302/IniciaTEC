<?php 

namespace Model;

class Plan extends ActiveRecord{
    protected static $table = 'plan';
    protected static $columnsDB = ['id', 'nombre', 'descripcion'];

    public $id;
    public $nombre;
    public $descripcion;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
    }

    public function validate(){
        if(!$this->nombre){
            self::setAlert('error', 'El nombre es obligatorio');
        }
        
        if(!$this->descripcion){
            self::setAlert('error', 'La descripción es obligatoria');
        }

        return self::$alerts;
    }
}