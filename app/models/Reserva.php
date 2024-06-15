<?php
namespace App\Models;

use PDO;
use App\Config\Connection;

class Reserva extends Model
{
    protected $table = 'reserva';
    private $data = [];

    // Métodos para definir os atributos
    public function setIdMorador($idMorador) {
        $this->data['id_morador'] = $idMorador;
        return $this;
    }

    public function setIdApartamento($idApartamento) {
        $this->data['id_apartamento'] = $idApartamento;
        return $this;
    }

    public function setIdAreasLazer($idAreasLazer) {
        $this->data['id_areas_lazer'] = $idAreasLazer;
        return $this;
    }

    public function setDataReserva($dataReserva) {
        $this->data['data_reserva'] = $dataReserva;
        return $this;
    }

    public function create() {
        $sql = "INSERT INTO reservas (id_morador, id_apartamento, id_areas_lazer, data_reserva) 
                VALUES (:id_morador, :id_apartamento, :id_areas_lazer, :data_reserva)";
        
        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':data_reserva', $this->data['data_reserva']);
        $stmt->bindParam(':id_morador', $this->data['id_morador']);
        $stmt->bindParam(':id_apartamento', $this->data['id_apartamento']);
        $stmt->bindParam(':id_areas_lazer', $this->data['id_areas_lazer']);

        return $stmt->execute();
    }

    public function fetchAllByUser($userId) {
        $sql = "SELECT 
                    r.*, a.nome 
                FROM reservas r
                INNER JOIN areas_lazer a ON r.id_areas_lazer = a.id_areas_lazer
                WHERE r.id_morador = :user_id";
        
        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
