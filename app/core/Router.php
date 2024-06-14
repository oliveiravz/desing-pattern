<?php
namespace App\Core;

class Router
{
    public static function run() {
        try {

            $routerRegistered = new RouterFilter();
            $router = $routerRegistered->get();

            $controller = new Controller();
            $controller->execute($router);
            
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
}