<?php
namespace App\Controllers;

use App\Models\Reserva;

class ReservaController extends Controller
{
    public function store() {
        $data = json_decode(file_get_contents('php://input'), true);

        if (!$data) {
            http_response_code(400);
            echo json_encode(['error' => 'Dados inválidos']);
            return;
        }

        $reserva = new Reserva();
        $result = $reserva->create($data);

        if ($result) {
            echo json_encode(['success' => 'Reserva registrada com sucesso']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Erro ao registrar a reserva']);
        }
    }

    public function getReservas() {
        $userId = $_GET['user_id'] ?? null;
        
        if (!$userId) {
            http_response_code(400);
            echo json_encode(['error' => 'ID do usuário não fornecido']);
            return;
        }

        $reserva = new Reserva();
        $reservas = $reserva->fetchAllByUser($userId);

        echo json_encode($reservas);
    }


}
