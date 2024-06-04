<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Security;

use Framework\Model;
use PDO;

class User extends Model
{
    // Validate login data
    public function validateLogin(array $data): bool
    {
        $this->errorMessage = [];

        if (empty($data['email'])) {
            $this->addError('email', 'Email is required.');
        }

        if (empty($data['password'])) {
            $this->addError('password', 'Password is required.');
        }

        return empty($this->errorMessage);
    }

    // Find user by email
    public function findByEmail(string $email): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE email = :email";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Find user by email
    public function findByPassword(string $password): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE password = :password";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
