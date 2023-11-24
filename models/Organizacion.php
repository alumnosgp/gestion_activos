<?php
namespace Model;

class Organizacion extends ActiveRecord
{
    protected static $tabla = 'organizaciones';
    protected static $columnasDB = ['org_nombre', 'org_situacion'];
    protected static $idTabla = 'org_id ';

    public $org_id  ;
    public $org_nombre;
    public $org_situacion;

    public function __construct($args = []){
        $this->org_id   = $args['org_id '] ?? null;
        $this->org_nombre = $args['org_nombre'] ?? '';
        $this->org_situacion = $args['org_situacion'] ?? '1';
       
    }
    public function organizacionNombre(){
        $sql = "SELECT org_id , org_nombre FROM organizaciones WHERE org_situacion = 1";
        return $this->fetchArray($sql);
    }
}

?>
