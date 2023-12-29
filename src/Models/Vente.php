<?php

namespace App\Models;

use PDO;

class Vente 
{
    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function ventes()
    {
        $query = "SELECT medicament.name,medicament.prix,users.username,vente.id FROM vente 
        JOIN users ON vente.id_patient = users.id 
        JOIN medicament ON medicament.id = vente.id_medicament 
        WHERE visibility = 1";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $results;
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $idMedicament = $_GET['id'];
            $req = "INSERT INTO vente (id_patient, id_medicament, type) VALUES (1, $idMedicament, 'online')";
            $res = $this->db->query($req);
            if ($res) {
                $this->decrementerQuantiteMedicament($idMedicament);
                header("Location:/user");
            }
        }
    }

    public function addventeMagasine()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['patient_id'], $_POST['drug_id'])) {
            $patientId = $_POST['patient_id'];
            $drugId = $_POST['drug_id'];
            $req = "INSERT INTO vente (id_patient, id_medicament, type) VALUES ($patientId, $drugId, 'local')";
            $stmt = $this->db->query($req);

            if ($stmt) {
                $this->decrementerQuantiteMedicament($drugId);
                header("Location:/sales");
            }
        }
    }

    private function decrementerQuantiteMedicament($medicamentId)
    {
        $updateQuery = "UPDATE medicament SET quantite = quantite - 1 WHERE id = ?";
        $stmt = $this->db->prepare($updateQuery);
        $stmt->execute([$medicamentId]);
    }

    public function delete(){
        if (isset($_GET["id"])) {
            $idvente= $_GET["id"];
            $req = "delete from vente where vente.id=$idvente";
            $res = $this->db->query($req);
            if ($res) {
                header("Location: /sales");
            }
        }
    }
    
    
}