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
    public static function all($order = 'DESC') {
        $query = "SELECT * FROM " . static::$table . " ORDER BY profesorId $order";
        $result = self::querySQL($query);
        return $result;
    }

}