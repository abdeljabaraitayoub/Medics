<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;
use App\Models\Vente;
use App\Models\Medicamentmodel;

class VenteController extends Controller
{
    public function index()
    {
        $cachier = new Vente();
        $results= $cachier->ventes();
        $vente=new Medicamentmodel();
        $drugs= $vente->getAllDrugs();
        $user=new User();
        $users= $user->getAllUsers();
        $this->render('admin/sales-detail',['results' => $results,'drugs' => $drugs,'users'=>$users]);
    }
    public function addOnLigne()
    {
        $ventemodel=new Vente();
        $ventemodel->add();
        
    }
    public function creerVenteEnMagasin() {
        $ventemagazine=new Vente();
        $ventemagazine->addventeMagasine();
    }

    public function deleteVente(){
        $ventemodel=new Vente();
        $ventemodel->delete();
    }

    public function getVente()
    {
        $vente = new Medicamentmodel();
        $drugs = $vente->getAllDrugs();
        
        $user = new User();
        $users = $user->getAllUsers();
        
        $venteModel = new Vente();
        
        $results = $venteModel->getVenteById();
    
        $this->render('admin/editvente', ['results' => $results, 'drugs' => $drugs, 'users' => $users]);
    }
    public function editVente(){
        $editvente=new Vente();
        $editvente->editVenteInMagasine();
        
    }
    


}
