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

    public function logDeletion($table_name, $record_id, $deleted_by, $ip_address) {

        $sql = "INSERT INTO deletion_logs (table_name, record_id, deleted_by, ip_address) 
                VALUES (:table_name, :record_id, :deleted_by, :ip_address)";

        $conn = new Connection();
        $pdo = $conn->getPdo();

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':table_name', $table_name);
        $stmt->bindParam(':record_id', $record_id);
        $stmt->bindParam(':deleted_by', $deleted_by);
        $stmt->bindParam(':ip_address', $ip_address);

        return $stmt->execute();
    }
}