<?php

namespace App\Models;

use App\Models\Database;
use PDO;

class User
{
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function login($email, $password)
    {
        $query = "select * from users where email = '$email' ";
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        // Perform login verification logic here
        if ($row[0]["email"] && password_verify($password, $row[0]["password"])) {

            $_SESSION["id"] = $row[0]["id"];
            $_SESSION["role"] = $row[0]["role"];
            // dump($_SESSION);
            // dump($_SESSION);
            if ($row[0]["role"] == "user") {
                header('location:/home');
            } elseif ($row[0]["role"] == "admin") {
                header('location:/admin');
            } elseif ($row[0]["role"] == "cachier") {
                header('location:/cashier');
            } else {
                header('location:/login');
            }
        } else {
            header('location:/login');
        }
    }

    public function logout(): void
    {
        // Perform logout logic here
    }

    public function register($fullname, $password, $email)
    {
        $Hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users  (username,password,email) VALUES ('$fullname','$Hashedpassword', '$email')";
        // dump($query);
        $result = $this->db->query($query);
        header('location:/');
        return $result;
    }
}
