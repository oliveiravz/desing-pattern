<?php
namespace App\Models;

class Apartamento extends Model
{
    protected string $table = "apartamento";

    protected array $fields = [
        'id_apartamento',
        'descricao'
    ];

    private ?int $idApartamento = null;
    private ?string $descricao = null;

    // Métodos para definir os atributos
    public function setIdApartamento(int $idApartamento) {
        $this->idApartamento = $idApartamento;
        return $this;
    }

    public function setDescricao(string $descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function getIdApartamento(): ?int {
        return $this->idApartamento;
    }

    public function getDescricao(): ?string {
        return $this->descricao;
    }

    // Salvar ou atualizar o apartamento no banco de dados
    public function save() {
        $connection = new Connection();
        $pdo = $connection->getPdo();

        if ($this->idApartamento) {
            // Atualizar o apartamento existente
            $sql = "UPDATE apartamento SET descricao = :descricao WHERE id_apartamento = :id_apartamento";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_apartamento', $this->idApartamento);
        } else {
            // Inserir um novo apartamento
            $sql = "INSERT INTO apartamento (descricao) VALUES (:descricao)";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindParam(':descricao', $this->descricao);
        return $stmt->execute();
    }
}
