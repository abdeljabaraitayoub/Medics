<?php

namespace App\Models;
use App\Models\Database;
use PDO;
class User
{
    public $name;
    public $email;
    public $password;
    public $is_admin;
    public $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function login(): void
    {
    }
    public function logout(): void
    {
    }
    public function register(): void
    {
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->db->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        return $users;
    }

}
