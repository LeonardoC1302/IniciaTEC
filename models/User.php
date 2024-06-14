<?php

namespace Model;

class User extends ActiveRecord
{
    protected static $table = 'usuario';
    protected static $columnsDB = ['id', 'nombre', 'apellidos', 'correo', 'contrasenna', 'celular', 'campusId', 'roleId', 'estadoId', 'token', 'fechaNotificacion'];

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
    public $fechaNotificacion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->contrasenna = $args['contrasenna'] ?? '';
        $this->celular = $args['celular'] ?? '';
        $this->campusId = $args['campusId'] ?? null;
        $this->roleId = $args['roleId'] ?? null;
        $this->estadoId = $args['estadoId'] ?? null;
        $this->token = $args['token'] ?? '';
        $this->fechaNotificacion = $args['fechaNotificacion'] ?? '';
    }

    public function validateLogin()
    {
        if (!$this->correo) {
            self::setAlert('error', 'El correo es obligatorio');
        } else if ($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::setAlert('error', 'El correo no es válido');
        }
        if (!$this->contrasenna) {
            self::setAlert('error', 'La contraseña es obligatoria');
        }

        return self::$alerts;
    }

    public function validateEmail()
    {
        if (!$this->correo) {
            self::setAlert('error', 'El correo es obligatorio');
        } else if ($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::setAlert('error', 'El correo no es válido');
        }

        return self::$alerts;
    }

    public function validatePassword()
    {
        if (!$this->contrasenna) {
            self::setAlert('error', 'La contraseña es obligatoria');
        } else if ($this->contrasenna && strlen($this->contrasenna) < 6) {
            self::setAlert('error', 'La contraseña debe tener al menos 6 caracteres');
        }
    }

    public function hashPassword(): void
    {
        $this->contrasenna = password_hash($this->contrasenna, PASSWORD_BCRYPT);
    }

    public function createToken(): void
    {
        $this->token = uniqid();
    }

    public function validateRegister()
    {
        if (!$this->nombre) {
            self::setAlert('error', 'El nombre es obligatorio');
        }
        if (!$this->apellidos) {
            self::setAlert('error', 'Los apellidos son obligatorios');
        }
        if (!$this->correo) {
            self::setAlert('error', 'El correo es obligatorio');
        } else if ($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::setAlert('error', 'El correo no es válido');
        }
        if (!$this->contrasenna) {
            self::setAlert('error', 'La contraseña es obligatoria');
        } else if ($this->contrasenna && strlen($this->contrasenna) < 6) {
            self::setAlert('error', 'La contraseña debe tener al menos 6 caracteres');
        }
        if (!$this->celular) {
            self::setAlert('error', 'El celular es obligatorio');
        }
        if (!$this->campusId) {
            self::setAlert('error', 'El campus es obligatorio');
        }
        if (!$this->roleId) {
            self::setAlert('error', 'El rol es obligatorio');
        }

        return self::$alerts;
    }

    public function generatePassword()
    {
        $this->contrasenna = uniqid();
    }

    public function validateAsistente()
    {
        if (!$this->nombre) {
            self::setAlert('error', 'El nombre es obligatorio');
        }
        if (!$this->apellidos) {
            self::setAlert('error', 'Los apellidos son obligatorios');
        }
        if (!$this->correo) {
            self::setAlert('error', 'El correo es obligatorio');
        } else if ($this->correo && !filter_var($this->correo, FILTER_VALIDATE_EMAIL)) {
            self::setAlert('error', 'El correo no es válido');
        }
        if (!$this->contrasenna) {
            self::setAlert('error', 'La contraseña es obligatoria');
        } else if ($this->contrasenna && strlen($this->contrasenna) < 6) {
            self::setAlert('error', 'La contraseña debe tener al menos 6 caracteres');
        }
        if (!$this->celular) {
            self::setAlert('error', 'El celular es obligatorio');
        }
        if (!$this->roleId) {
            self::setAlert('error', 'El rol es obligatorio');
        }

        return self::$alerts;
    }
}
