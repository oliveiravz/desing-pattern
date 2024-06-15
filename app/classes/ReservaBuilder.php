<?php
namespace App\Models;

class ReservaBuilder
{
    private $reserva;

    public function __construct() {
        $this->reserva = new Reserva();
    }

    public function setIdMorador($idMorador) {
        $this->reserva->setIdMorador($idMorador);
        return $this;
    }

    public function setIdApartamento($idApartamento) {
        $this->reserva->setIdApartamento($idApartamento);
        return $this;
    }

    public function setIdAreasLazer($idAreasLazer) {
        $this->reserva->setIdAreasLazer($idAreasLazer);
        return $this;
    }

    public function setDataReserva($dataReserva) {
        $this->reserva->setDataReserva($dataReserva);
        return $this;
    }

    public function create() {
        return $this->reserva->create();
    }

    public function getReserva() {
        return $this->reserva;
    }


    use App\Models\ReservaBuilder;

// Criando uma nova reserva usando o builder
$reservaBuilder = new ReservaBuilder();
$reservaBuilder->setIdMorador(1)
               ->setIdApartamento(101)
               ->setIdAreasLazer(5)
               ->setDataReserva('2024-06-15')
               ->create();

// Buscando reservas de um usuário
$reserva = new Reserva();
$reservas = $reserva->fetchAllByUser(1);
print_r($reservas);
}
