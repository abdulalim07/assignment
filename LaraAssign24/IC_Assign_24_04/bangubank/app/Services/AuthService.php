<?php

namespace App\Services;

use App\Models\User;
use Config\Database;

class AuthService
{
    protected $dbConnection;

    public function __construct()
    {
        // Establish the database connection
        $db = new Database();
        $this->dbConnection = $db->getConnection();
    }

    protected function getUsersFromDatabase(): array
    {
        $query = "SELECT id, name, email, password FROM users";
        $result = $this->dbConnection->query($query);

        $users = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function findUserByEmail(string $email): ?array
    {
        $query = "SELECT id, name, email, password FROM users WHERE email = ?";
        $stmt = $this->dbConnection->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $stmt->close();

        return $user ?: null;
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
