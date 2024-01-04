<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Vente;
use App\Models\User;
use App\Models\Medicamentmodel;

class UserController extends Controller
{
    public function index()
    {
        $medicamentModel = new Medicamentmodel();
        $results = $medicamentModel->getAllDrugs();
        // dump($medicamentModel->medicament());
        $user = new auth();
        if (!isset($_SESSION["id"])) {
            header('location:/');
        } else {
            $this->render('user/index', ['results' => $results]);
        }
    }
    public function search()
    {
        $search = $_GET['search'];
        $medicamentModel = new Medicamentmodel();
        $results = $medicamentModel->search($search);
        // dump($medicamentModel->medicament());
        $this->render('user/medecin', ['results' => $results]);
    }
    public function index2()
    {
        // dump($_SESSION);
        $user = new User();
        $users = $user->getAllUsers();
        // dump($users);
        $this->render('admin/users', ['users' => $users]);
    }
}
