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
        $query = "select * from medicament";
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        return $row;
    }
    public function vente()
    {
        $query = "SELECT * FROM `vente` INNER JOIN `medicament` ON vente.id_medicament = medicament.id JOIN users on vente.id_patient=users.id";
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        return $row;
    }
    public function bon($med_id)
    {
        $id = $_SESSION['id'];
        $query = "SELECT * FROM `vente` INNER JOIN `medicament` ON vente.id_medicament = medicament.id JOIN users on vente.id_patient=users.id where id_medicament=$med_id and id_patient=$id ORDER BY vente.id DESC LIMIT 1";
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        return $row;
    }
}
