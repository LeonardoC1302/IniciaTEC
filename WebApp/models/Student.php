<?php 

namespace Model;

class Student extends ActiveRecord{
    protected static $table = 'estudiante';
    protected static $columnsDB = ['id', 'usuarioId', 'carnet'];

    public $id;
    public $usuarioId;
    public $carnet;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? null;
        $this->carnet = $args['carnet'] ?? '';
    }

    public function validateUpdate(){
        if(!$this->carnet){
            self::setAlert('error', 'El carnet es obligatorio');
        }

        if(!$this->nombre){
            self::setAlert('error', 'El nombre es obligatorio');
        }

        if(!$this->apellidos){
            self::setAlert('error', 'Los apellidos son obligatorios');
        }

        if(!$this->correo){
            self::setAlert('error', 'El correo es obligatorio');
        }

        if(!$this->celular){
            self::setAlert('error', 'El celular es obligatorio');
        }

        if(!$this->campus){
            self::setAlert('error', 'El campus es obligatorio');
        }

        return self::getAlerts();
    }
}