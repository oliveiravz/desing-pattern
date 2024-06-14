<?php
namespace App\Core;

class Request 
{
    public static function input($name) {
        if(isset($_POST[$name])) {
            return $_POST[$name];
        }

        throw new \Exception("O input {$name} não existe");
    }

    public static function all() {
        return $_POST;
    }
}