<?php
namespace Model;

class Personaplanilla extends ActiveRecord
{
    protected static $tabla = 'persona_planilla';
    protected static $columnasDB = ['pcivil_catalogo', 'pcivil_nombre1', 'pcivil_nombre2', 'pcivil_apellido1', 'pcivil_apellido2', 'pcivil_dpi', 'pcivil_plaza', 'pcivil_telefono', 'pcivil_direccion','pcivil_emal','pcivil_situacion'];
    protected static $idTabla = 'pcivil_id';

    public $pcivil_id ;
    public $pcivil_catalogo;
    public $pcivil_nombre1;
    public $pcivil_nombre2;
    public $pcivil_apellido1;
    public $pcivil_apellido2;
    public $pcivil_dpi;
    public $pcivil_plaza;
    public $pcivil_telefono;
    public $pcivil_direccion;
    public $pcivil_emal;
    public $pcivil_situacion;

    public function __construct($args = []){
        $this->pcivil_id  = $args['pcivil_id'] ?? null;
        $this->pcivil_catalogo = $args['pcivil_catalogo'] ?? '';
        $this->pcivil_nombre1 = $args['pcivil_nombre1'] ?? '';
        $this->pcivil_nombre2 = $args['pcivil_nombre2'] ?? '';
        $this->pcivil_apellido1 = $args['pcivil_apellido1'] ?? '';
        $this->pcivil_apellido2 = $args['pcivil_apellido2'] ?? '';
        $this->pcivil_dpi = $args['pcivil_dpi'] ?? '';
        $this->pcivil_plaza = $args['pcivil_plaza'] ?? '';
        $this-> pcivil_telefono = $args[' pcivil_telefono'] ?? '';
        $this->pcivil_direccion = $args['pcivil_direccion'] ?? '';
        $this->pcivil_emal = $args['pcivil_emal'] ?? '';
        $this->pcivil_situacion = $args['pcivil_situacion'] ?? '1';
       
    }
    public function personaPlanilla(){
        $sql = "SELECT pcivil_id, pcivil_catalogo, pcivil_nombre1 || ' ' || pcivil_nombre2 || ' ' || pcivil_apellido1 || ' ' || pcivil_apellido2 AS personaPlanillaNombre, pcivil_plaza
        FROM persona_planilla
        WHERE pcivil_situacion = 1";
        return $this->fetchArray($sql);
    }

}

?>