<?php

namespace App\Models;

use App\Models\User;
use App\Models\Database;
use PDO;
// use Symfony\Component\VarDumper\VarDumper;

class Adminmodel extends User
{
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function users()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); // Move this line here
        dump($results);
        return $results;
    }
    //hna dir dok les function dyol l admin
}
