<?php

namespace App\Models;

class User
{
    public $name;
    public $email;
    public $password;
    public $is_admin;

    public function __construct($name, $email, $password, $is_admin)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
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
}
