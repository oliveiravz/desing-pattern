<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Morador;

class MoradoresController extends Controller
{
    protected string $view = 'moradores';

    protected string $title = "Relatório de Moradores";

    public function getMoradores() {

        $moradores = new Morador();

        $moradores = $moradores->getMoradores();
        
        $this->index($moradores);
    }

    public function delete($id) {
        $moradores = new Morador();

        $result = $moradores->delete($id);

        if ($result) {
           exit(json_encode(['success' => true, "message" => "Reserva cancelar com sucesso"]));
        } 

        exit(json_encode(['success' => false, "message" => 'Erro o cancelar reserva']));
    }
}