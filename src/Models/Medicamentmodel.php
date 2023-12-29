<?php

namespace App\Models;
use App\Models\Database;
use PDO;
// use Symfony\Component\VarDumper\VarDumper;

class Medicamentmodel 
{
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function getAllDrugs()
    {
        $query = "SELECT * FROM medicament where visibility=1";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $results;
    }
    
}
