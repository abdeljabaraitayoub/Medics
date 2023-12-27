<?php

namespace App\Models;

use App\Models\User;

class Patient extends User
{
    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password, 0);
    }
    //hna dir dok les function dyol l patient
}
