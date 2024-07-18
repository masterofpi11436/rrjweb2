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

    // Find the user by id
    public function findById($id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create the reset token and set the expiration to expire the token in 1 hour
    public function storeResetToken(int $userId, string $token, string $expiry): void
    {
        $conn = $this->db->getConn();

        $sql = "UPDATE user SET reset_token = :token, token_expiry = :expiry WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":token", $token, PDO::PARAM_STR);
        $stmt->bindValue(":expiry", $expiry, PDO::PARAM_STR);
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function findByToken(string $token): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM user WHERE reset_token = :token";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":token", $token, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword(int $userId, string $hashedPassword): void
    {
        $conn = $this->db->getConn();

        $sql = "UPDATE user SET password = :password, reset_token = NULL, token_expiry = NULL WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":password", $hashedPassword, PDO::PARAM_STR);
        $stmt->bindValue(":id", $userId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
