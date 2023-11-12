<?php
namespace Model;

class Maquina extends ActiveRecord
{
    protected static $tabla = 'maquina';
    protected static $columnasDB = ['maq_tipo', 'maq_nombre', 'maq_mac', 'maq_ram_capacidad', 'maq_tipo_disco_duro', 
    'maq_disco_capacidad', 'maq_plaza', 'maq_per_alta', 'maq_per_planilla', 'maq_procesador_capacidad', 'maq_lic_so', 
    'maq_office', 'maq_lic_office', 'maq_antivirus', 'maq_lic_antv', 'maq_uso', 'maq_situacion', 'maq_sistema_op'];
    protected static $idTabla = 'maq_id';

    public $maq_id;
    public $maq_tipo;
    public $maq_nombre;
    public $maq_mac;
    public $maq_ram_capacidad;
    public $maq_tipo_disco_duro;
    public $maq_disco_capacidad;
    public $maq_procesador_capacidad;
    public $maq_plaza;
    public $maq_per_alta;
    public $maq_per_planilla;
    public $maq_sistema_op;
    public $maq_lic_so;
    public $maq_office;
    public $maq_lic_office;
    public $maq_antivirus;
    public $maq_lic_antv;
    public $maq_uso;
    public $maq_situacion;

    public function __construct($args = [])
    {
        $this->maq_id = $args['maq_id'] ?? null;
        $this->maq_tipo = $args['maq_tipo'] ?? '';
        $this->maq_nombre = $args['maq_nombre'] ?? '';
        $this->maq_mac = $args['maq_mac'] ?? '';
        $this->maq_ram_capacidad = $args['maq_ram_capacidad'] ?? '';
        $this->maq_tipo_disco_duro = $args['maq_tipo_disco_duro'] ?? '';
        $this->maq_disco_capacidad = $args['maq_disco_capacidad'] ?? '';
        $this->maq_procesador_capacidad = $args['maq_procesador_capacidad'] ?? '';
        $this->maq_plaza = $args['maq_plaza'] ?? null;
        $this->maq_per_alta = $args['maq_per_alta'] ?? null;
        $this->maq_per_planilla = $args['maq_per_planilla'] ?? null;
        $this->maq_sistema_op = $args['maq_sistema_op'] ?? null;
        $this->maq_lic_so = $args['maq_lic_so'] ?? 'no';
        $this->maq_office = $args['maq_office'] ?? null;
        $this->maq_lic_office = $args['maq_lic_office'] ?? 'no';
        $this->maq_antivirus = $args['maq_antivirus'] ?? null;
        $this->maq_lic_antv = $args['maq_lic_antv'] ?? 'no';
        $this->maq_uso = $args['maq_uso'] ?? '';
        $this->maq_situacion = $args['maq_situacion'] ?? '1';
    }
}
?>