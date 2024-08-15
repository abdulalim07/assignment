<?php

namespace App\Controllers;

class AuthController
{
    public function logout()
    {
        // Unset all of the session variables
        $_SESSION = [];

        // Destroy the session
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }

        // Redirect to the login page or any other page you want
        $this->redirect('/');
    }

    protected function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}

// Example usage:
$authController = new AuthController();
$authController->logout();
