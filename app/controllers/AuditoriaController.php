<?php

namespace App\Controllers;

use App\Models\Auditoria;

class AuditoriaController extends Controller 
{
    protected string $view = "auditoria";
    protected string $title = "Controle de login";

    public function get() {
        $auditorias = new Auditoria();

        $auditorias = $auditorias->fetchAll();

        $this->index($auditorias);
    }
}