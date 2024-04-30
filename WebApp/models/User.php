<?php

namespace Model;

class User extends ActiveRecord{
    protected static $table = 'usuario';
    protected static $columnsDB = ['id', 'nombre', 'apellidos', 'correo', 'contrasenna', 'celular', 'campusId', 'roleId', 'estadoId', 'token'];

    public $id;
    public $nombre;
    public $apellidos;
    public $correo;
    public $contrasenna;
    public $celular;
    public $campusId;
    public $roleId;
    public $estadoId;
    public $token;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->contrasenna = $args['contrasenna'] ?? '';
        $this->celular = $args['celular'] ?? '';
        $this->campusId = $args['campusId'] ?? '';
        $this->roleId = $args['roleId'] ?? '';
        $this->estadoId = $args['estadoId'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public function validateLogin(){
        if(!$this->correo){
            self::setAlert('error', 'El correo es obligatorio');
        } else if($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)){
            self::setAlert('error', 'El correo no es válido');
        }
        if(!$this->contrasenna){
            self::setAlert('error', 'La contraseña es obligatoria');
        }

        return self::$alerts;
    }

    public function validateEmail(){
        if(!$this->correo){
            self::setAlert('error', 'El correo es obligatorio');
        } else if($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)){
            self::setAlert('error', 'El correo no es válido');
        }

        return self::$alerts;
    }

    public function validatePassword(){
        if(!$this->contrasenna){
            self::setAlert('error', 'La contraseña es obligatoria');
        } else if($this->contrasenna && strlen($this->contrasenna) < 6){
            self::setAlert('error', 'La contraseña debe tener al menos 6 caracteres');
        }
    }

    public function hashPassword() : void {
        $this->contrasenna = password_hash($this->contrasenna, PASSWORD_BCRYPT);
    }

    public function createToken() : void {
        $this->token = uniqid();
    }
}