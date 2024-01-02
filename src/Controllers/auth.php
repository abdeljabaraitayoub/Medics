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
    public function logout()
    {
        $user = new User();
        $user->logout();
    }
    public function is_logged()
    {
        $user = new User();
        $user->is_logged();
    }
    public function is_admin()
    {
        $user = new User();
        if ($user->is_admin()) {
            return true;
        };
    }
    //hna dir dok les function dyol l admin
}
