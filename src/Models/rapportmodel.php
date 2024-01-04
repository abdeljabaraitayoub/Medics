<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class rapportmodel
{
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }


    public function stock()
    {
        $query = "icament";
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        return $row;
    }
}
