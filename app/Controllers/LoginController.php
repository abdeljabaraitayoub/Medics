<?php
namespace App\Controllers;

class LoginController
{
    public function login()
    {
        // Fetch data from the "users" table
       
        $data = 'Hello, this is the Login page!';
       
        require(__DIR__ .'../../../view/login.php');
       

    }
    public function creat()
    {
        // // Fetch data from the "users" table
    
        if (isset($_POST['match'])) {
            
            dump($_POST['match']);
        }

    }
}
?>
