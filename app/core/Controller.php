<?php
namespace App\Core;

class Controller
{
    public function execute(string $router) {

        if(!str_contains($router, '@')) {
            throw new \Exception("A rota está no formato errado");
        }

        list($controller, $method) = explode("@", $router);

        $namespace = "App\Controllers\\";
        $controllerNamespace = $namespace.$controller;

        if(!class_exists($controllerNamespace)) {
            throw new \Exception("O controller {$controllerNamespace} não existe");
        }

        $controller = new $controllerNamespace;

        if(!method_exists($controller, $method)) {
            throw new \Exception("O método {$method} não existe na controller {$controllerNamespace}");
        }

        $params = new ControllerParams();
        $params->get($router);

        return $controller->$method($params);

    }
}