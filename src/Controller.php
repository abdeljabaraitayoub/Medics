<?php

namespace App;

class Controller
{
    protected function render($view, $data = [])
    {
        extract($data);

        // include "Views/$view.php";
        include "../views/$view.php";
    }
    protected function renderpdf($view, $data = [])
    {
        ob_start();

        extract($data);

        include "../views/$view.php";
        // dump(include "../views/$view.php");
        $htmlContent = ob_get_clean();

        return $htmlContent;
    }
}
