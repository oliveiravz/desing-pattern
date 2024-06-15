<?php
namespace App\Models;

class ApartamentoBuilder
{
    private $apartamento;

    public function __construct() {
        $this->apartamento = new Apartamento();
    }

    public function setIdApartamento(int $idApartamento) {
        $this->apartamento->setIdApartamento($idApartamento);
        return $this;
    }

    public function setDescricao(string $descricao) {
        $this->apartamento->setDescricao($descricao);
        return $this;
    }

    public function build() {
        return $this->apartamento;
    }
}
