<?php

namespace App\Controllers;

use Dompdf\Dompdf;

use Dompdf\Options;
use App\Controllers\auth;
use App\Controller;
use App\Models\rapportmodel;

class rapport extends Controller
{
    public function stock()
    {
        $user = new auth();
        if (!$user->is_admin()) {
            $this->render('403');
        } else {

            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Courier');
            $dompdf->setOptions($options);

            $user = new rapportmodel();

            $htmlContent = $this->renderpdf('/admin/stockRapport', $user->stock());

            $dompdf->loadHtml($htmlContent);

            $dompdf->setPaper('A4', 'portrait');

            $dompdf->render();

            $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview

        }
    }
    public function vente()
    {
        $user = new auth();
        if (!$user->is_admin()) {
            $this->render('403');
        } else {
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Courier');
            $dompdf->setOptions($options);

            $user = new rapportmodel();

            $htmlContent = $this->renderpdf('/admin/venteRapport', $user->vente());
            $dompdf->loadHtml($htmlContent);

            $dompdf->setPaper('', 'portrait');

            $dompdf->render();

            $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview

        }
    }
    public function bon()
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $user = new rapportmodel();
        $id = $_GET['id'];
        $htmlContent = $this->renderpdf('/admin/bon', $user->bon($id));
        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('', 'portrait');

        $dompdf->render();

        $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview


    }
    //hna dir dok les function dyol l admin
}
