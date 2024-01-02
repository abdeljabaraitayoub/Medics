<?php
use App\Models\MedCrud;
use App\Models\Employee;
// Import the UserModel class
class UserController
{
    private $userModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('login');
        }

    }

    public function index()
    {
        // Remove the unused variable declaration
        $this->userModel->getAllUsers();
        
        $data = [
            // "notifications" => Notification::get(),
            "offers" => Employee::get()
        ];

        return view("dashboard/candidat", $data);
        }

    // Implement other controller actions for CRUD operations
}
