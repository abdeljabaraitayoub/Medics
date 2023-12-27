<?php

namespace App\Models;

require_once  __DIR__ . '/../../config/config.php';

use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $dsn = DSN;
        $username = DB_USERNAME;
        $password = DB_PASSWORD;
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    // Method to run queries
    public function query($query)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
