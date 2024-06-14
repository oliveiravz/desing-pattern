<?php
namespace App\Routes;

class Routes
{
    public static function get()
    {
        return [
            "get" => [
                "/" => "LoginController@index",
                "/login" => "LoginController@index",
                "/home" => "HomeController@index",
                "/user" => "UserController@index",
                "/user" => "UserController@getApartamentos",
                "/relatorio" => "AuditoriaController@get",
                "/areas" => "AreasLazerController@get",
                "/reservas" => "ReservaController@getReservas",
                "/logout" => "Logout@logout"
            ],
           "post" => [
                "/user" => "UserController@store",
                "/validate" => "LoginController@validate",
                "/reservar" => "ReservaController@store"
            ]
        ]; 
    }
}