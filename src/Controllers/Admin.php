<?php

namespace App\Controllers;

use App\Models\Database;
use App\Models\Adminmodel;
use App\Controller;

use App\Models\User;
use App\Controllers\auth;

class Admin extends Controller
{
    public $db;
    public function index()
    {
        $user = new auth();
        if (!$user->is_admin()) {
            $this->render('403');
        } else {
            $this->render('admin/index');
        }
    }


    //hna dir dok les function dyol l admin
}
