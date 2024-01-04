<?php


namespace App\Controllers;

use App\Controller;
use App\Models\User;
use App\Models\Vente;
use App\Models\Med;

class MedController extends Controller
{
    public function ShowMed()
    {
        $med = new Med();
        $meds = $med->meds();
        $this->render('admin/medicine', ['meds' => $meds]);
    }
    public function getMedEDit()
    {
        $med = new Med();
        $meds = $med->meds();
        
    
        $this->render('admin/edit-med', ['meds' => $meds]);
    }
    
    public function deleteMed(){
        $ventemodel=new Med();
        $ventemodel->deleteMed();
    }

    public function editMed(){
        $editMed=new Med();
        $editMed->editMedInMagasine();
        $this->ShowMed();

    }
    public function creerMedEnMagasin() {
        $ventemagazine=new Med();
        $ventemagazine->addMedMagasine();
    }
}