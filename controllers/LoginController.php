<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\Usuario;

class LoginController
{

    public static function index(Router $router)
    {
        if (!isset($_SESSION['auth_user'])) {
            $router->render('login/index', []);
        } else {
            $router->render('maquinas/index', []);
       
        }
    }

    public static function loginAPI()
    {
        $catalogo = $_POST['usu_catalogo'];
        $password = $_POST['usu_password'];
        
        $usuarioRegistrado = Usuario::fetchFirst("SELECT * FROM usuario WHERE usu_catalogo = $catalogo");

        try {
            if (is_array($usuarioRegistrado)) {
                // $verificacion = password_verify($password, $usuarioRegistrado['usu_password']);
                $verificacion =true;
                $nombre = $usuarioRegistrado["usu_nombre"];

                if ($verificacion) {
                    session_destroy();
                    session_start();
                    $_SESSION['auth_user'] = $catalogo;

                    echo json_encode([
                        'codigo' => 1,
                        'mensaje' => "Sesión iniciada correctamente. Bienvenido $nombre",
                        'redireccion' => '/gestion_activos/maquinas'
                    ]);
                } else {
                    echo json_encode([
                        'codigo' => 2,
                        'mensaje' => 'Contraseña incorrecta'
                    ]);
                }
            } else {
                echo json_encode([
                    'codigo' => 2,
                    'mensaje' => 'Usuario no encontrado'
                ]);
            }
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'codigo' => 0,
                'mensaje' => 'Usuario no encontrado'
            ]);
        }
    }


}