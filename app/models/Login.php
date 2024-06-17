<?php
namespace App\Models;

use App\Config\Connection;
use PDO;

class Login extends Model implements MoradorInterface
{
    protected string $table = "morador";

    public function getMorador(array $data) {
        $email = strtoupper(trim($data['email']));
        $senha = trim($data['senha']);

        $sql = "SELECT 
                    apartamento.descricao,
                    apartamento.id_apartamento,
                    morador.id_morador,
                    morador.email,
                    morador.nome,
                    morador.senha,
                    morador.nome
                FROM morador
                INNER JOIN apartamento ON apartamento.id_apartamento = morador.apartamento_id_apartamento
                WHERE morador.ativo IS TRUE
                AND morador.email = :email
                AND morador.senha = :senha";
        
        $conn = Connection::getInstance();
        $pdo = $conn->getPdo();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
