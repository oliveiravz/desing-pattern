<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Morador;

class MoradoresController extends Controller
{
    protected string $view = "moradores";
    protected string $title = "Cadastrar Moradores";

    public function getMoradores() {
        $moradores = new Morador();

        $moradores = $moradores->getMoradoresAtivos();

        $this->index($moradores);
    }

    public function delete($id) {
        $morador = new Morador();

        $result = $morador->delete($id);

        if ($result) {
           exit(json_encode(['success' => true, "message" => "Morador excluido com sucesso"]));
        } 

        exit(json_encode(['success' => false, "message" => 'Erro ao excluir morador']));
    }
}