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
                "/morador" => "MoradorController@index",
                "/morador" => "MoradorController@getApartamentos",
                "/moradores" => "MoradoresController@getMoradores",
                "/apartamentos" => "ApartamentoController@store",
                "/relatorio" => "AuditoriaController@get",
                "/areas" => "AreasLazerController@get",
                "/reservas" => "ReservaController@getReservas",
                "/reservas-ativas" => "ReservaController@getReservasAtivas",
                "/reservas/morador/[0-9]+" => "ReservaController@getReservasByMorador",
                "/delecoes" => "DelecoesController@getDeletes",
                "/logout" => "Logout@logout"
            ],
           "post" => [
                "/morador" => "MoradorController@store",
                "/validate" => "LoginController@validate",
                "/reservar" => "ReservaController@store",
                "/reserva/excluir/[0-9]+" => "ReservaController@delete",
                "/morador/excluir/[0-9]+" => "MoradoresController@delete"
            ]
        ]; 
    }
}