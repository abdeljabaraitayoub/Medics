<?php

namespace App\Models;

use __classes\Connection;
use PDO;

class Employee {

    public static function get()
    {
        $stmt = (new DatabaseModel())->pdo->query("SELECT employee.*,users.username,jobs.company FROM employee JOIN jobs ON employee.user_id = jobs.user_id JOIN users ON users.id = employee.user_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function updateStatus($status,$id)
    {
        $stmt = (new DatabaseModel())->pdo->prepare("UPDATE employee SET employee.status=:status WHERE employee.id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->bindParam(":status",$status,PDO::PARAM_STR);
        return $stmt->execute();
    }
}