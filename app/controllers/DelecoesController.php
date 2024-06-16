<?php

namespace App\Controllers;

use App\Models\Auditoria;

class DelecoesController extends Controller 
{
    protected string $view = "delecoes";
    protected string $title = "Relatório de Deleções";

    public function getDeletes() {
        $auditorias = new Auditoria();

        $delecoes = $auditorias->getDeletes();

        $this->index($delecoes);
    }
}