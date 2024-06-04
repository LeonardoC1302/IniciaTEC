<?php

namespace Model;

interface UserInterface {
    public function getUserId();
    public function getNombreUsuario();
    public function getContrasenna();
    public function getRol();
    public function getEstado();
    public function getCorreo();
    public function getCarnet();
    public function setContrasenna($contrasenna);
    public function setEstado($estado);
}