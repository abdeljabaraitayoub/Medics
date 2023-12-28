<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Medicamentmodel;

class UserController extends Controller
{
    public function index()
    {
        $medicamentModel = new Medicamentmodel();
        $results = $medicamentModel->medicament();
        // dump($medicamentModel->medicament());
        $this->render('user/index', ['results' => $results]);
    }
}
