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
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? null;
        $this->codigo = $args['codigo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->foto = $args['foto'] ?? '';
        $this->isCoordinador = $args['isCoordinador'] ?? '';
    }

    public function validateRegister(){
        if(!$this->nombre){
            self::setAlert('error', "El nombre es obligatorio");
        }
        if(!$this->apellidos){
            self::setAlert('error', "El apellido es obligatorio");
        }
        if(!$this->correo){
            self::setAlert('error', "El correo es obligatorio");
        }
        if(!$this->celular){
            self::setAlert('error', "El celular es obligatorio");
        }
        if(!$this->campusId){
            self::setAlert('error', "El campus es obligatorio");
        }
        if(!$this->codigo){
            self::setAlert('error', "El código es obligatorio");
        }
        if(!$this->telefono){
            self::setAlert('error', "El teléfono es obligatorio");
        }

        // Validar que el correo no esté registrado
        $existingUser = User::where('correo', $this->correo);
        if($existingUser){
            self::setAlert('error', "El correo ya está registrado");
        }
        return self::$alerts;
    }
}