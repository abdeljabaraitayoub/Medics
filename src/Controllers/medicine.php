<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class medicine extends Controller
{
    public function medicine()
    {
        $this->render('admin/medicine');
    }
    //hna dir dok les function dyol l admin
}
