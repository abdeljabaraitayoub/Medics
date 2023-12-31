<?php

namespace App\Controllers;

use Dompdf\Dompdf;

use Dompdf\Options;

use App\Controller;
use App\Models\rapportmodel;

class rapport extends Controller
{
    public function stock()
    {

        // dump($_POST);
        define("DOMPDF_ENABLE_REMOTE", true);
        // $dompdf = new Dompdf();
        $dompdf = new Dompdf();
        $options = $dompdf->getOptions();
        $options->setDefaultFont('Courier');
        $dompdf->setOptions($options);

        $user = new rapportmodel();
        // dump($user->stock());


        dd(get_loaded_extensions());


        $image = file_get_contents("./build/images/logo.png");
        $encrypted = base64_encode($image);

        $htmlContent = $this->renderpdf('/admin/stockRapport', ['stock' => $user->stock(), 'encrypted' => $encrypted]);
        // dump($htmlContent);
        $dompdf->loadHtml($htmlContent);

        $dompdf->setPaper('', 'landscape');

        $dompdf->render();

        $dompdf->stream("stock_report.pdf", array("Attachment" => false)); // Use "true" for download or "false" for preview
    }
    //hna dir dok les function dyol l admin
}
