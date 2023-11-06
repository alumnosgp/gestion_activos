<?php
namespace Model;

class Personalta extends ActiveRecord
{
    protected static $tabla = 'persona_dealta';
    protected static $columnasDB = ['per_catalogo', 'per_nombre1', 'per_nombre2', 'per_apellido1', 'per_apellido2', 'per_arma','per_grado','per_pplaza', 'per_telefono', 'per_direccion','per_email','per_situacion'];
    protected static $idTabla = 'per_id';

    public $per_id ;
    public $per_catalogo;
    public $per_nombre1;
    public $per_nombre2;
    public $per_apellido1;
    public $per_apellido2;
    public $per_arma;
    public $per_grado;
    public $per_plaza;
    public $per_condicion;
    public $per_telefono;
    public $per_direccion;
    public $per_email;
    public $per_situacion;

    public function __construct($args = []){
        $this->per_id  = $args['per_id'] ?? null;
        $this->per_catalogo = $args['per_catalogo'] ?? '';
        $this->per_nombre1 = $args['per_nombre1'] ?? '';
        $this->per_nombre2 = $args['per_nombre2'] ?? '';
        $this->per_apellido1 = $args['per_apellido1'] ?? '';
        $this->per_apellido2 = $args['per_apellido2'] ?? '';
        $this->per_arma = $args['per_arma'] ?? '';
        $this->per_grado = $args['per_grado'] ?? '';
        $this->per_plaza = $args['per_plaza'] ?? '';
        $this->per_condicion = $args['per_condicion'] ?? '';
        $this->per_telefono = $args['per_telefono'] ?? '';
        $this->per_direccion = $args['per_direccion'] ?? '';
        $this->per_email = $args['per_email'] ?? '';
        $this->per_situacion = $args['per_situacion'] ?? '1';
       
    }
    public function personaDatos(){
        $sql = "SELECT per_id, per_catalogo, per_grado, per_nombre1 || ' ' || per_nombre2 || ' ' || per_apellido1 || ' ' || per_apellido2 AS personaNombre, per_plaza
        FROM persona_dealta
        WHERE per_situacion = 1";
        return $this->fetchArray($sql);
    }

}

?>