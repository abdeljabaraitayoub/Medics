<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class auth extends Controller
{
    public function getlogin()
    {
        $this->render('index');
    }
    public function login()
    {
        // dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = new User();
        $user->login($email, $password);
    }
    public function getregister()
    {
        $this->render('register');
    }
    public function register()
    {
        // dump($_POST);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $username = $_POST['username'];
        $user = new User();
        $user->register($username, $password, $email);
    }
    //hna dir dok les function dyol l admin
}