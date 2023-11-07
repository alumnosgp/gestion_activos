<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class MenuController
{

    public static function index(Router $router)
    {        
        if ($_SESSION['auth_user'] != "") {
            $router->render('menu/index', []);
        } else {
            $router->render('login/index', []);
        }
    }
    public static function closeSessionAPI(Router $router) {
       unset($_SESSION['auth_user']);
    }

}