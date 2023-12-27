<?php
require_once  '../../config/config.php';
class DatabaseModel
{
    private $pdo;

    public function __construct()
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

    // Method to run queries
    public function Query($query, $params = [])
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
