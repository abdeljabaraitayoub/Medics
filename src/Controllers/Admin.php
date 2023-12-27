<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class Admin extends Controller
{
    public function index()
    {
        $this->render('admin/index');
    }
    //hna dir dok les function dyol l admin
}
