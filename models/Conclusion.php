<?php
namespace Model;

class Conclusion extends ActiveRecord
{
    protected static $tabla = 'conclusiones';
    protected static $columnasDB = ['conclu_nombre', 'conclu_situacion'];
    protected static $idTabla = 'conclu_id';

    public $conclu_id;
    public $conclu_nombre;
    public $conclu_situacion;

    public function __construct($args = []){
        $this->conclu_id  = $args['conclu_id'] ?? null;
        $this->conclu_nombre = $args['conclu_nombre'] ?? '';
        $this->conclu_situacion = $args['conclu_situacion'] ?? '1';
       
    }
    public function conclusionNombre(){
        $sql = "SELECT conclu_id, conclu_nombre 
        FROM conclusiones
        WHERE conclu_situacion = 1 
        ORDER BY conclu_nombre";
        return $this->fetchArray($sql);
    }
}
?>