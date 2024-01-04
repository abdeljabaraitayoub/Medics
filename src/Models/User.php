<?php

namespace App\Models;

use App\Models\Database;
use App\Models\AuthInterface;
use PDO;

class User implements AuthInterface
{
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function login($email, $password)
    {
        $query = "select * from users where email = '$email' ";
        // dump($query);
        $stmt = $this->db->query($query);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // dump($row);
        // Perform login verification logic here
        if ($row[0]["email"] && password_verify($password, $row[0]["password"])) {
            $_SESSION["id"] = $row[0]["id"];
            $_SESSION["role"] = $row[0]["is_admin"];
            // dump($_SESSION);
            // dump($_SESSION);
            if ($row[0]["is_admin"] == 0) {
                header('location:/user');
            } elseif ($row[0]["is_admin"] == 1) {
                header('location:/admin');
            } else {
                header('location:/');
            }
        } else {
            header('location:/');
        }
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
    public function logout(): void
    {
        session_destroy();
        header('location:/');
    }
    public function is_logged()
    {
        if (isset($_SESSION["id"])) {
            return true;
        }
    }
    public function is_admin()
    {
        if (isset($_SESSION["role"]) == 1) {
            return true;
        }
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
}
