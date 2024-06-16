<?php
namespace App\Models;

use PDO;
use App\Models\Model;
use App\Config\Connection;

class Login extends Model
{
    protected string $table = "morador";

    public function getMorador(array $data) {
        
        $email = strtolower(trim($data['email']));
        $senha = trim($data['senha']);

        $ip_address = $_SERVER['REMOTE_ADDR'];

        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare("SELECT COUNT(*) as attempt_count 
                               FROM login_attempts 
                               WHERE ip_address = :ip_address 
                               AND success = FALSE 
                               AND attempt_time >= NOW() - INTERVAL 2 MINUTE");

        $stmt->bindParam(':ip_address', $ip_address);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['attempt_count'] >= 3) {
            return ['success' => false, 'message' => 'Login bloqueado devido a várias tentativas malsucedidas. Tente novamente em 10 minutos.' ];
        }

        $sql = "SELECT 
                    apartamento.descricao,
                    apartamento.id_apartamento,
                    morador.id_morador,
                    morador.email,
                    morador.nome,
                    morador.senha,
                    morador.nome,
                    morador.admin
                FROM morador
                INNER JOIN apartamento ON apartamento.id_apartamento = morador.apartamento_id_apartamento
                WHERE morador.ativo IS TRUE
                AND morador.email = :email";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $morador = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($morador && password_verify($senha, $morador["senha"])) {
            
            $stmt = $pdo->prepare("INSERT INTO login_logs (user_id, username, success, ip_address) VALUES (:user_id, :email, TRUE, :ip_address)");
            $stmt->bindParam(':user_id', $morador['id_morador']);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ip_address', $ip_address);
            $stmt->execute();

            $stmt = $pdo->prepare("DELETE FROM login_attempts WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $morador['id_morador']);
            $stmt->execute();

            $morador['success'] = true;

            return $morador;
        } else {
            
            $stmt = $pdo->prepare("INSERT INTO login_logs (user_id, username, success, ip_address) VALUES (NULL, :email, FALSE, :ip_address)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ip_address', $ip_address);
            $stmt->execute();

            $user_id = $morador ? $morador['id_morador'] : NULL;
            $stmt = $pdo->prepare("INSERT INTO login_attempts (user_id, ip_address, success) VALUES (:user_id, :ip_address, FALSE)");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':ip_address', $ip_address);
            $stmt->execute();

            return [];
        }
    }
}
