<?php
namespace App\Models;

use App\Config\Connection;

use PDO;
use PDOException;

abstract class Model
{
    private string $fields = "*";
    private string $filters = "";
    
    public function fetchAll() {

        try {
            
            $sql = "SELECT {$this->fields} FROM {$this->table} {$this->filters}";
            $connection = new Connection();
            $pdo = $connection->getPdo();

            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        } catch (PDOException $e) {
            throw new \Exception("Error: " .$e->getMessage());
        }
    }
}