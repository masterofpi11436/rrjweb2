<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class User extends Model
{
    // Override the table name if the class name and table name does not match
    // protected $table = "tablet";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    protected function validateForm(array $data): void
    {
        if (empty($data["email"])) {
            $this->addError("email", "Email is required!");
        }

        if (empty($data["last_name"])) {
            $this->addError("last_name", "Last name is required!");
        }

        if (empty($data["first_name"])) {
            $this->addError("first_name", "First name is required!");
        }

        if (empty($data["password"])) {
            $this->addError("password", "Password is required!");
        }
    }

    // Search functionality
    public function searchUsersWithRoles(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
                LEFT JOIN role ON user.role_id = role.id
                WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the name of the role for all users
    public function getUsersWithRoles(): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
                LEFT JOIN role ON user.role_id = role.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the name of the role for one user
    public function getIndividualWithRole(int $userId): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
                LEFT JOIN role ON user.role_id = role.id
                WHERE user.id = :userId";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}