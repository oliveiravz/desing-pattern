<?php
namespace App\Models;

use PDO;
use App\Config\Connection;

class Auditoria extends Model
{

    protected string $table = "login_logs";

    public function loginAttempt(array $data) {

        $email = $data['user']['email'];
        $senha = $data['user']['senha'];
        $ip   = $data['user']['ip'];
        
        $sql = "CALL login_attempt('$email', '$senha', '$ip')";
        
        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare($sql);

        $stmt->execute();
    }

    public function getDeletes() {

        $sql = "SELECT 
                    dl.*,
                    m.nome
                FROM deletion_logs dl
                INNER JOIN morador m ON dl.deleted_by = m.id_morador;
                ";
        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}