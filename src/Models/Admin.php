<?php

namespace App\Models;

use App\Models\User;

class Admin extends User
{
    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password, 1);
    }
    //hna dir dok les function dyol l admin
}
