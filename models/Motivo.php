<?php
namespace Model;

class Motivo extends ActiveRecord
{
    protected static $tabla = 'motivos';
    protected static $columnasDB = ['mot_nombre', 'mot_situacion'];
    protected static $idTabla = 'mot_id';

    public $mot_id;
    public $mot_nombre;
    public $mot_situacion;

    public function __construct($args = []){
        $this->mot_id  = $args['mot_id'] ?? null;
        $this->mot_nombre = $args['mot_nombre'] ?? '';
        $this->mot_situacion = $args['mot_situacion'] ?? '1';
       
    }
    // public function armaNombre(){
    //     $sql = "SELECT mot_id, mot_nombre 
    //     FROM armas
    //     WHERE mot_situacion = 1 
    //     ORDER BY mot_nombre";
    //     return $this->fetchArray($sql);
    // }
}
?>