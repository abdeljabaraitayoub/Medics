<?php

namespace App\Models;

interface AuthInterface
{

    public function login($email, $password);
    public function logout();
    public function register($fullname, $password, $email);
    public function is_admin();
    public function is_logged();
}
