<?php
namespace App\Models;

use PDO;
use App\Config\Connection;

class Morador extends Model
{

    public function validate($data) {
        
        $email = $data->getEmail();
        $nome = $data->getNome();

        $sql = "SELECT id_morador FROM morador WHERE email = :email AND nome = :nome AND ativo IS TRUE";

        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome', $nome);

        $stmt->execute();

        $morador = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($morador)) {
            return ["success" => false, "message" => "Morador já cadastrado no sistema"];
        }

        return [];
    }

    public function create($data) {

        $email = $data->getEmail();
        $emailDois = $data->getEmailDois();
        $nome = $data->getNome();
        $cpf = $data->getCpf();
        $senha = password_hash($data->getSenha(), PASSWORD_DEFAULT, ['cost' => 10]);
        $apartamentoId = $data->getApartamentoId();
        $telefone = $data->getTelefone();
        $telefoneDois = $data->getTelefoneDois();

        $sql = "INSERT INTO morador ( email, email_dois, nome, cpf, senha, apartamento_id_apartamento, telefone, telefone_dois
                  ) VALUES (
                    :email, :email_dois, :nome, :cpf, :senha, :apartamento_id_apartamento, :telefone, :telefone_dois
                  )";

        $connection = new Connection();
        $pdo = $connection->getPdo();

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':email_dois', $emailDois);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':apartamento_id_apartamento', $apartamentoId);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':telefone_dois', $telefoneDois);
        
        if($stmt->execute()) {
            return ["success" => true, "message" => "Morador {$nome} cadastrado com sucesso"];
        }

        return ["success" => false , "message" => "Morador {$nome} cadastrado com sucesso"];
    }

    public function getMoradores() {

        $sql = "SELECT 
                    m.*,
                    a.descricao as apartamento_nome
                FROM morador m
                INNER JOIN apartamento a ON a.id_apartamento = m.apartamento_id_apartamento
                WHERE m.ativo IS true";

        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
    
        if(is_array($id)) {
            $id = $id[0];
        }

        $sql = "UPDATE morador SET ativo = FALSE WHERE id_morador = :id";

        $connection = new Connection();
        $pdo = $connection->getPdo();

        $this->logDeletion('morador', $id, $_SESSION['user']['id_morador'], $_SERVER['REMOTE_ADDR']);

        $stmt = $pdo->prepare($sql);
        
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
}