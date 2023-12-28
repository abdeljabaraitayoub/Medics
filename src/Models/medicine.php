<?php
namespace App\Models;

class medicine
{
    public $title;
    public $date;

    public function __construct($title, $date)
    {
        $this->title = $title;
        $this->date = $date;
    }
    
}