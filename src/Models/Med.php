<?php

namespace App\Models;

use PDO;

class Med
{
    public $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function meds()
    {
        $query = "SELECT * FROM medicament";
        $stmt = $this->db->query($query);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    public function editMedInMagasine()
    {
        
        if (isset($_POST['MedPrix'])) {
            // die("here");
            $idMedicament = $_POST['id'];
            $prix = $_POST['MedPrix'];
            $desc = $_POST["MedDesc"];
            $medName = $_POST["MedName"];
            
            
            $req = "UPDATE medicament SET name = ?, prix = ?, description = ? WHERE id = ?";
            $stmt = $this->db->prepare($req);
    
            $stmt->execute([$medName, $desc, $prix, $idMedicament]);
    
            
        } 
    }
    public function addMedMagasine()
    {
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Med_Desc'])) {
            $MedName = $_POST['Med_Name'];
            $MedDesc = $_POST['Med_Desc'];
            $MedPrix = $_POST['Med_Prix'];

            $req = "INSERT INTO medicament (name, description, prix) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($req);
            $stmt->execute([$MedName, $MedDesc, $MedPrix]);

            if ($stmt) {
                header("Location:/medicine");
            }
        }
    }
    public function deleteMed()
    {
        if (isset($_GET["id"])) {
            $idvente = $_GET["id"];
            $req = "DELETE FROM medicament where medicament.id=$idvente";
            $res = $this->db->query($req);
            if ($res) {
                header("Location: /medicine");
            }
        }
    }
    private function decrementerQuantiteMedicament($medicamentId)
    {
        $updateQuery = "UPDATE medicament SET quantite = quantite - 1 WHERE id = ?";
        $stmt = $this->db->prepare($updateQuery);
        $stmt->execute([$medicamentId]);
    }

    // public function add()
    // {
    //     if (isset($_SESSION["id"])) {
    //         $idPatient = $_SESSION["id"];
    //     }

    //     if (isset($_GET['id'])) {
    //         $idMedicament = $_GET['id'];
    //         $req = "INSERT INTO vente (id_patient, id_medicament, type) VALUES ($idPatient, $idMedicament, 'online')";
    //         $res = $this->db->query($req);
    //         if ($res) {
    //             $this->decrementerQuantiteMedicament($idMedicament);
    //             header("Location:/user");
    //         }
    //     }
    // }

    // public function addventeMagasine()
    // {
    //     if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['patient_id'], $_POST['drug_id'])) {
    //         $patientId = $_POST['patient_id'];
    //         $drugId = $_POST['drug_id'];
    //         $req = "INSERT INTO vente (id_patient, id_medicament, type) VALUES ($patientId, $drugId, 'local')";
    //         $stmt = $this->db->query($req);

    //         if ($stmt) {
    //             $this->decrementerQuantiteMedicament($drugId);
    //             header("Location:/sales");
    //         }
    //     }
    // }

    // private function decrementerQuantiteMedicament($medicamentId)
    // {
    //     $updateQuery = "UPDATE medicament SET quantite = quantite - 1 WHERE id = ?";
    //     $stmt = $this->db->prepare($updateQuery);
    //     $stmt->execute([$medicamentId]);
    // }

    // public function delete()
    // {
    //     if (isset($_GET["id"])) {
    //         $idvente = $_GET["id"];
    //         $req = "delete from vente where vente.id=$idvente";
    //         $res = $this->db->query($req);
    //         if ($res) {
    //             header("Location: /sales");
    //         }
    //     }
    // }

    // public function editVenteInMagasine()
    // {
        
    //     if (isset($_POST['patient_id'], $_POST['drug_id']) && isset($_POST["id"])) {
    //         $patientId = $_POST['patient_id'];
    //         $drugId = $_POST['drug_id'];
    //         $idvente = $_POST["id"];
    //         $req = "UPDATE vente SET id_patient = ?, id_medicament = ?, type = 'local' WHERE id = ?";
    //         $stmt = $this->db->prepare($req);
    
    //         $stmt->execute([$patientId, $drugId, $idvente]);
    
    //         if ($stmt) {
    //             $this->decrementerQuantiteMedicament($drugId);
    //             header("Location:/sales");
    //         }
    //     } 
    // }
    
    
    public function getVenteById()
    {
        if (isset($_GET["id"])) {
            $IdMed = $_GET["id"];
            $req = "SELECT * from vente where id=$IdMed";
            $res = $this->db->query($req);
            $results = $res->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        }
    }
}
