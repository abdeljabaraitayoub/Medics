<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Cashiermodel;

class CashierController extends Controller
{
    public function index()
    {
        $cachier = new Cashiermodel();
        dump($cachier->ventes());
        $this->render('cashier/daily-sales');
    }

    
}
