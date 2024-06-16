<?php
namespace App\Models;

use PDO;
use App\Config\Connection;

class Reserva extends Model
{
    protected $table = 'reservas';

    public function create($data) {
        // dd($data);   
        $sql = "INSERT INTO reservas (id_morador, id_apartamento, id_areas_lazer, data_reserva) 
                VALUES (:id_morador, :id_apartamento, :id_areas_lazer, :data_reserva)";
        
        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':data_reserva', $data['data_reserva']);
        $stmt->bindParam(':id_morador', $data['id_morador']);
        $stmt->bindParam(':id_apartamento', $data['id_apartamento']);
        $stmt->bindParam(':id_areas_lazer', $data['id_areas_lazer']);

        return $stmt->execute();
    }


    public function delete($userId) {
        
        if(is_array($userId)) {
            $userId = $userId[0];
        }

        $sql = "UPDATE reservas SET ativo = FALSE WHERE id_reservas = :id";

        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':id', $userId);
        
        return $stmt->execute();
    }

    public function fetchAllByUser($userId) {
        
        if(is_array($userId)) {
            $userId = $userId[0];
        }
        
        $sql = "SELECT 
                    r.id_reservas,
                    r.data_reserva,
                    a.nome 
                FROM reservas r
                INNER JOIN areas_lazer a ON r.id_areas_lazer = a.id_areas_lazer
                WHERE r.ativo IS TRUE
                AND r.id_morador = :user_id";
        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':user_id', $userId);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getReservasAtivas() {
        
        $sql = "SELECT a.nome, r.data_reserva FROM reservas r INNER JOIN areas_lazer a ON r.id_areas_lazer = a.id_areas_lazer WHERE r.ativo IS TRUE";
        
        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
