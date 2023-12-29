<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\Adminmodel;
use App\Controller;

use App\Models\User;

class Admin extends Controller
{
    public $db;
    public function index()
    {
        $admin = new Adminmodel();
        $this->render('admin/index');
    }


    //hna dir dok les function dyol l admin
}
