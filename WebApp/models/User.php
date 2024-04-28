<?php

namespace Model;

class User extends ActiveRecord{
    protected static $table = 'usuario';
    protected static $columnsDB = ['id', 'nombre', 'apellidos', 'correo', 'contrasenna', 'celular', 'campusId', 'roleId', 'estadoId'];

    public $id;
    public $nombre;
    public $apellidos;
    public $correo;
    public $contrasenna;
    public $celular;
    public $campusId;
    public $roleId;
    public $estadoId;

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
    }
}