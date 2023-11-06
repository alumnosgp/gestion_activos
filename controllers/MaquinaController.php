<?php

namespace Controllers;

use Exception;
use Model\Maquina;
use Model\Oficina;
use Model\Persona;
use Model\Antiviru;
use Model\Office;
use Model\Sistema;
use MVC\Router;

class MaquinaController{
    public static function index(Router $router){
        $oficina = new Oficina();
        $oficinas = $oficina->oficinaNombre(); 
        $persona = new Persona();
        $personas = $persona->personaDatos(); 
        $sistema = new Sistema();
        $sistemas = $sistema->sistemaNombre(); 
        $antiviru = new Antiviru();
        $antivirus = $antiviru->antivirusNombre(); 
        $office = new Office();
        $offices = $office->OfficeNombre(); 
        $router->render('maquinas/index', ['oficinas' => $oficinas, 'personas' => $personas, 'sistemas' => $sistemas, 'antivirus' => $antivirus, 'offices' => $offices,]);
    }



    public static function guardarApi(){
        try {
            $sitemas = new Maquina($_POST);
            $resultado = $sitemas->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarAPI()
    {
        $sist_nombre = $_GET['sist_nombre'];

        $sql = "SELECT * FROM sistema_operativo where sist_situacion = 1 ";
        if ($sist_nombre != '') {
            $sql .= " and sist_nombre like '%$sist_nombre%' ";
        }
        try {

            $sistemas = Maquina::fetchArray($sql);

            echo json_encode($sistemas);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
        try {
            $sitemas = new Maquina($_POST);           
           
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Pago modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error db',
                    'codigo' => 0,
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error excepcion',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI()
    {
        try {
            $sist_id = $_POST['sist_id'];
            $sitemas = Maquina::find($sist_id);
            $sitemas->sist_situacion = '2'; // Cambiar a la situación deseada para eliminar
            $resultado = $sitemas->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Maquina eliminada correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarNombresAPI()
    {
        $nombre = $_GET['per_id'] ?? '';

        $sql = "SELECT  per_catalogo, per_grado, per_puesto
        FROM personas 
        where per_id = $nombre";

        try {
            $nombre = Persona::fetchArray($sql);

            // Establece el tipo de contenido de la respuesta a JSON
            header('Content-Type: application/json');

            // Convierte el array a JSON 
            echo json_encode($nombre);
            return;
        } catch (Exception $e) {
            // En caso de error, envía una respuesta vacía
            echo json_encode([]);
        }
    }
}

?>
