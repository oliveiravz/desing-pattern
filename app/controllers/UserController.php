<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Core\Request;
use App\Models\Apartamento;

class UserController extends Controller
{
    protected string $view = "user";
    protected string $title = "Cadastrar Moradores";

    public function store() {

        $data = Request::all();

        dd($data);
    }

    public function getApartamentos() {

        $apartamentos = new Apartamento();

        $this->index($apartamentos);
    }
}

