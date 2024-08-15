<?php

namespace App\Services;

class xAuthService
{
    protected $users;

    public function __construct()
    {
        $this->users = $this->getUsersFromFile();
    }

    protected function getUsersFromFile(): array
    {
        $filePath = './datastore/users.txt';

        // Read and split the file content by lines
        $fileContent = file_get_contents($filePath);
        $usersArray = explode("\n", trim($fileContent));

        // Convert JSON lines to associative arrays
        return array_map(fn($user) => json_decode($user, true), $usersArray);
    }

    public function findUserByEmail(string $email): ?array
    {
        foreach ($this->users as $user) {
            if ($user['email'] === $email) {
                return $user;
            }
        }

        return null;
    }

    public function verifyCredentials(string $email, string $password): bool
    {
        $user = $this->findUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $this->setUserSession($user);
            return true;
        }

        return false;
    }

    protected function setUserSession(array $user): void
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
    }
}
