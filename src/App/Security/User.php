<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Security;

use Framework\Model;
use PDO;

class User extends Model
{
    protected array $errors = [];

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

    // Get the token from the query string
    public function getToken($resetToken)
    {        
        $token = $_GET['token'];
    
        $conn = $this->db->getConn();
    
        $sql = "SELECT * FROM user WHERE reset_token = :token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":token", $token, PDO::PARAM_STR);
        $stmt->execute();
    
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result;
    }

    public function updatePassword($data)
    {
        $conn = $this->db->getConn();
        $hashedPassword = password_hash($data['new_password'], PASSWORD_DEFAULT);

        // Retrieve the user ID from the reset_token
        $resetToken = $data['reset_token'];
        $sql = "SELECT id FROM user WHERE reset_token = :reset_token";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":reset_token", $resetToken, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $userId = $user['id'];

            $sql = "UPDATE user SET reset_token = null, token_expiry = null, password = :password WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(":password", $hashedPassword, PDO::PARAM_STR);
            $stmt->bindValue(":id", $userId, PDO::PARAM_INT);

            return $stmt->execute();
        } else {
            return false;
        }
    }

}
