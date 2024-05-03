<?php 

namespace Model;

class ProfessorXTeam extends ActiveRecord{
    protected static $table = 'profesorxequipo';
    protected static $columnsDB = ['profesorId', 'equipoId'];

    public $profesorId;
    public $equipoId;

    public function __construct($args = []){
        $this->profesorId = $args['profesorId'] ?? null;
        $this->equipoId =$arg['equipoId'] ?? NULL;
    }
    public static function all1($equipoId) {
        $query = "SELECT * FROM " . static::$table . " WHERE equipoId = $equipoId ORDER BY profesorId DESC";
        $result = self::querySQL($query);
        return $result;
    }

}