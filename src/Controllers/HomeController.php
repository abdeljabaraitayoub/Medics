<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Journal;

class HomeController extends Controller
{
    public function index()
    {
       

        $this->render('index',);
    }

    public function user()
    {

        $this->render('user');
    }
    public function login()
    {
        // $this->render('/admin/index');
    }
    public function insert()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = isset($_POST["username"]) ? $_POST["username"] : "";
            $email = isset($_POST["password"]) ? $_POST["password"] : "";
            $this->render('layout/home', ['name' => $name]);
        }
    }
}
