<?php
namespace App\Config;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Connection
{
    private $pdo;

    public function __construct() {
        $this->loadEnv();
        $this->connect();
    }

    public function loadEnv() {
        $dotEnv = Dotenv::createImmutable(__DIR__ . "/../..");
        $dotEnv->load();
    }

    public function connect() {
        // var_dump($_ENV);exit;
        $dbHost = $_ENV['DB_HOST'];
        $dbPort = $_ENV['DB_PORT'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        $dbName = $_ENV['DB_NAME'];

        try {
            $this->pdo = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            
            die("Connection error: ".$e->getMessage());

        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}