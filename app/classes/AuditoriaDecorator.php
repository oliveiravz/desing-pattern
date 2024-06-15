<?php
namespace App\Models;

use App\Models\MoradorInterface;
use App\Config\Connection;

class AuditoriaDecorator implements MoradorInterface
{
    protected $login;

    public function __construct(MoradorInterface $login) {
        $this->login = $login;
    }

    public function getMorador(array $data) {
        // Executa a função original
        $result = $this->login->getMorador($data);

        // Adiciona funcionalidade de auditoria
        $this->auditLoginAttempt($data['email'], $data['senha'], $result);

        return $result;
    }

    private function auditLoginAttempt($email, $senha, $result) {
        // Implementação da lógica de auditoria aqui
        $logMessage = "Tentativa de login com email: $email e senha: $senha";

        // Exemplo de inserção em um log (pode ser ajustado conforme a necessidade)
        $sql = "INSERT INTO login_logs (mensagem) VALUES (:mensagem)";
        
        $conn = new Connection();
        $pdo = $conn->getPdo();
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':mensagem', $logMessage);
        $stmt->execute();
    }
}
