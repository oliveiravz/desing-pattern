<?php
namespace App\Models;

use PDO;
use App\Config\Connection;

class AreaLazer extends Model
{
    protected string $table = "areas_lazer";

    protected array $fields = [
        'id_area',
        'descricao_area'
    ];

    private ?int $idArea = null;
    private ?string $descricaoArea = null;

    // Métodos para definir os atributos
    public function setIdArea(int $idArea) {
        $this->idArea = $idArea;
        return $this;
    }

    public function setDescricaoArea(string $descricaoArea) {
        $this->descricaoArea = $descricaoArea;
        return $this;
    }

    public function getIdArea(): ?int {
        return $this->idArea;
    }

    public function getDescricaoArea(): ?string {
        return $this->descricaoArea;
    }

    // Salvar ou atualizar a área de lazer no banco de dados
    public function save() {
        $connection = new Connection();
        $pdo = $connection->getPdo();

        if ($this->idArea) {
            // Atualizar a área de lazer existente
            $sql = "UPDATE areas_lazer SET descricao_area = :descricao_area WHERE id_area = :id_area";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id_area', $this->idArea);
        } else {
            // Inserir uma nova área de lazer
            $sql = "INSERT INTO areas_lazer (descricao_area) VALUES (:descricao_area)";
            $stmt = $pdo->prepare($sql);
        }

        $stmt->bindParam(':descricao_area', $this->descricaoArea);
        return $stmt->execute();
    }



    use App\Models\AreaLazerBuilder;

// Criando uma nova área de lazer usando o builder
$areaLazerBuilder = new AreaLazerBuilder();
$areaLazer = $areaLazerBuilder->setDescricaoArea('Piscina')
                              ->build();
$areaLazer->save();

// Atualizando uma área de lazer existente usando o builder
$areaLazerBuilder = new AreaLazerBuilder();
$areaLazer = $areaLazerBuilder->setIdArea(1)
                              ->setDescricaoArea('Academia')
                              ->build();
$areaLazer->save();

}
