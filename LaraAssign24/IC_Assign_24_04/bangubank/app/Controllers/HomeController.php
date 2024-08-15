<?php
namespace App\Controllers;

use Src\Support\AppHelper;
use Src\Support\DataValidation;
use Src\View\View;
use App\Models\User;
use App\Services\AuthService;
use Config\Database;

// require_once __DIR__ . "/../../src/Support/helper.php";

class HomeController
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function index()
    {
        return AppHelper::view('home.index');
    }

    public function login()
    {
        return AppHelper::view('home.login');
    }

    public function authVerify($request)
    {
        $email = $request['email'] ?? null;
        $password = $request['password'] ?? null;

        if ($email && $password && $this->authService->verifyCredentials($email, $password)) {
            return AppHelper::redirect('customer', '');
        }

        // Handle authentication failure
        return AppHelper::redirect('login', 'Authentication failed. Please check your credentials.');
    }
}
