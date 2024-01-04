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

            // dump($_POST);
            // define("DOMPDF_ENABLE_REMOTE", true);
            // $dompdf = new Dompdf();
            $dompdf = new Dompdf();
            $options = $dompdf->getOptions();
            $options->setDefaultFont('Courier');
            $dompdf->setOptions($options);

            $user = new rapportmodel();
            // dump($user->stock());


            // dd(get_loaded_extensions());


            // $image = file_get_contents("./build/images/logo.png");
            // $encrypted = base64_encode($image);

            $htmlContent = $this->renderpdf('/admin/stockRapport', $user->stock());
            // dump($htmlContent);
            $dompdf->loadHtml($htmlContent);

            $dompdf->setPaper('', 'landscape');

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
            // dump($user->vente());


            // dd(get_loaded_extensions());


            // $image = file_get_contents("./build/images/logo.png");
            // $encrypted = base64_encode($image);

            $htmlContent = $this->renderpdf('/admin/venteRapport', $user->vente());
            // dump($htmlContent);
            $dompdf->loadHtml($htmlContent);

            $dompdf->setPaper('', 'landscape');

            $dompdf->render();

            $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview

        }
        // dump($_POST);
        // define("DOMPDF_ENABLE_REMOTE", true);
        // $dompdf = new Dompdf();
    }
    public function bon()
    {

        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $user = new rapportmodel();
        // dump($user->vente());


        // dd(get_loaded_extensions());


        // $image = file_get_contents("./build/images/logo.png");
        // $encrypted = base64_encode($image);
        $id = $_GET['id'];
        $htmlContent = $this->renderpdf('/admin/bon', $user->bon($id));
        // dump($htmlContent);
        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('', 'landscape');

        $dompdf->render();

        $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview


        // dump($_POST);
        // define("DOMPDF_ENABLE_REMOTE", true);
        // $dompdf = new Dompdf();
    }
    //hna dir dok les function dyol l admin
}
