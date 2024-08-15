<?php

namespace App\Controllers;

use Src\View\View;
use App\Models\User;
use Config\Database;
use Src\Requests\RegistrationRequest;
use Src\Support\AppHelper;

class RegistrationController
{
    protected $dbConnection;

    public function __construct()
    {
        $db = new Database();
        $this->dbConnection = $db->getConnection();
    }

    public function index()
    {
        return AppHelper::view('registration.index');
    }

    public function store($request)
    {
        $registrationRequest = new RegistrationRequest($request);

        if (!$registrationRequest->passes()) {
            return $this->redirectBackWithErrors($request->errors());
        }

        $user = $this->createUser($registrationRequest->name, $registrationRequest->email, $registrationRequest->password);

        $this->dbConnection->close();

        return $this->redirectWithSuccess('/login', 'Registration successful.');
    }

    protected function createUser(string $name, string $email, string $password): User
    {
        $stmt = $this->dbConnection->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            $userId = $stmt->insert_id;
            $stmt->close();
            return new User($userId, $name, $email, $password);
        } else {
            $stmt->close();
            throw new \Exception("Failed to create user.");
        }
    }

    protected function redirectBackWithErrors(array $errors)
    {
        return AppHelper::redirect('/', $errors);
    }

    protected function redirectWithSuccess(string $route, string $message)
    {
        return AppHelper::redirect($route, $message);
    }
}
