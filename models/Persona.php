<?php
namespace Model;

class Persona extends ActiveRecord
{
    protected static $tabla = 'persona';
    protected static $columnasDB = ['per_catalogo', 'per_nombre', 'per_apellido', 'per_arma','per_grado','per_oficina','per_puesto','per_condicion','per_direccion','per_email','per_situacion'];
    protected static $idTabla = 'per_id';

    public $per_id ;
    public $per_catalogo;
    public $per_nombre;
    public $per_apellido;
    public $per_arma;
    public $per_grado;
    public $per_oficina;
    public $per_puesto;
    public $per_condicion;
    public $per_telefono;
    public $per_direccion;
    public $per_email;
    public $per_situacion;

    public function __construct($args = []){
        $this->per_id  = $args['per_id'] ?? null;
        $this->per_catalogo = $args['per_catalogo'] ?? '';
        $this->per_nombre = $args['per_nombre'] ?? '';
        $this->per_apellido = $args['per_apellido'] ?? '';
        $this->per_arma = $args['per_arma'] ?? '';
        $this->per_grado = $args['per_grado'] ?? '';
        $this->per_oficina = $args['per_oficina'] ?? '';
        $this->per_puesto = $args['per_puesto'] ?? '';
        $this->per_condicion = $args['per_condicion'] ?? '';
        $this->per_telefono = $args['per_telefono'] ?? '';
        $this->per_direccion = $args['per_direccion'] ?? '';
        $this->per_email = $args['per_email'] ?? '';
        $this->per_situacion = $args['per_situacion'] ?? '1';
       
    }
    public function personaDatos(){
        $sql = "SELECT per_id, per_catalogo, per_grado, per_nombre || ' ' || per_apellido AS personaNombre, per_puesto
        FROM persona
        WHERE per_situacion = 1";
        return $this->fetchArray($sql);
    }

}

?>