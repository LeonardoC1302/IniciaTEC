<?php 

namespace Model;

class StudentUserDecorator implements UserInterface{
    private $student;
    private $user;

    public function __construct($args=[]){
        $this->student = new Student($args);
        $this->user = new User($args);

        $this->user->contrasenna = $this->student->carnet;
    }

    public function getUserId() {
        return $this->user->id;
    }

    public function getNombreUsuario() {
        return $this->user->correo;
    }

    public function getContrasenna() {
        return $this->user->contrasenna;
    }

    public function setContrasenna($contrasenna) {
        $this->user->contrasenna = $contrasenna;
    }

    public function getRol() {
        $rol = Role::where('id', $this->user->roleId);
        return $rol->nombre;
    }

    public function getEstado() {
        $estado = UserStatus::where('id', $this->user->estadoId);
        return $estado->nombre;
    }

    public function setEstado($estado) {
        $estadoId = UserStatus::where('nombre', $estado);
        if($estadoId){
            $this->user->estadoId = $estadoId->id;
        }
    }

    public function getCorreo() {
        return $this->user->correo;
    }

    public function getCarnet() {
        return $this->student->carnet;
    }

    public function validateRegister(){
        return $this->user->validateRegister();
    }

    public function hashPassword(){
        return $this->user->hashPassword();
    }

    public function save(){
        $result = $this->user->save();
        $this->student->usuarioId = $result['id'];
        $this->student->save();
    }
}