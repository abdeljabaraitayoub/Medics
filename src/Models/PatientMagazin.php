<?php

namespace App\Models;

use App\Models\patient;

class PatientMagazin extends patient
{
    public function __construct($name, $email, $password)
    {
        parent::__construct($name, $email, $password);
    }
}
