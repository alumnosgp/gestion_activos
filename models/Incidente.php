<?php
namespace Model;

class Incidente extends ActiveRecord
{
    protected static $tabla = 'incidente';
    protected static $columnasDB = ['inc_fecha', 'inc_no_incidente', 'inc_no_identificacion', 'inc_catalogo_irt', 'inc_email_irt', 'inc_tel_irt', 'inc_catalogo_rep', 'inc_email_rep', 'inc_tel_rep', 'inc_direccion_rep', 'inc_situacion'];
    protected static $idTabla = 'inc_id';

    public $inc_id;
    public $inc_fecha;
    public $inc_no_incidente;
    public $inc_no_identificacion;
    public $inc_catalogo_irt;
    public $inc_email_irt;
    public $inc_tel_irt;
    public $inc_catalogo_rep;
    public $inc_email_rep;
    public $inc_tel_rep;
    public $inc_direccion_rep;
    public $inc_situacion;

    public function __construct($args = []){
        $this->inc_id  = $args['inc_id'] ?? null;
        $this->inc_fecha = $args['inc_fecha'] ?? '';
        $this->inc_no_incidente = $args['inc_no_incidente'] ?? '';
        $this->inc_no_identificacion = $args['inc_no_identificacion'] ?? '';
        $this->inc_catalogo_irt = $args['inc_catalogo_irt'] ?? '';
        $this->inc_email_irt = $args['inc_email_irt'] ?? '';
        $this->inc_tel_irt = $args['inc_tel_irt'] ?? '';
        $this->inc_catalogo_rep = $args['inc_catalogo_rep'] ?? '';
        $this->inc_email_rep = $args['inc_email_rep'] ?? '';
        $this->inc_tel_rep = $args['inc_tel_rep'] ?? '';
        $this->inc_direccion_rep = $args['inc_direccion_rep'] ?? '';
        $this->inc_situacion = $args['inc_situacion'] ?? '1';
       
    }
}

?>
