<?php
namespace App\Controllers;

use App\Models\Reserva;

class ReservaController extends Controller
{
    protected string $view = "reservas";
    protected string $title = "Minhas Reservas";

    public function getReservasByMorador($id) {
        
        $reserva = new Reserva();

        $reservas = $reserva->fetchAllByUser($id);

        $this->index($reservas);
    }

    public function delete($id) {
        
        $reserva = new Reserva();

        $result = $reserva->delete($id);

        if ($result) {
           exit(json_encode(['success' => true, "message" => "Reserva cancelar com sucesso"]));
        } 

        exit(json_encode(['success' => false, "message" => 'Erro o cancelar reserva']));
    }

    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data) {
            http_response_code(400);
            exit(json_encode(['error' => 'Dados inválidos']));
        }

        $reserva = new Reserva();
        $result = $reserva->create($data);

        if ($result) {
            exit(json_encode(['success' => 'Reserva registrada com sucesso']));
        } else {
            http_response_code(500);
            exit(json_encode(['error' => 'Erro ao registrar a reserva']));
        }
    }

    public function getReservas() {

        $reserva = new Reserva();
        
        $reservas = $reserva->getReservasAtivas();
        
        exit(json_encode($reservas));
    }


}
