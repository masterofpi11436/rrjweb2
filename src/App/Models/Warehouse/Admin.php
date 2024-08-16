<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;

class Admin extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "user";

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
    }

    public function findUserByEmail($email)
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM user WHERE email = :email";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserRecord($id, $data)
    {
        $conn = $this->db->getConn();
    
        $fields = [];
    
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }
        $sql = "UPDATE user SET " . implode(", ", $fields) . " WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT); // Assuming id is an integer
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }

    // Search functionality
    public function searchAdminssWithRoles(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
            LEFT JOIN role ON user.role_id = role.id
            WHERE (first_name LIKE :search OR last_name LIKE :search OR email LIKE :search)
            AND (role_id IN (8, 9, 10, 11) OR warehouse_role IN (8, 9, 10, 11))
            ORDER BY last_name";

        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the name of the role for all admins
    public function getAdminsWithRoles(): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
            LEFT JOIN role ON user.role_id = role.id
            WHERE role_id IN (8, 9, 10, 11) OR warehouse_role IN (8, 9, 10, 11)
            ORDER BY last_name";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the name of the role for one admin
    public function getAdminWithRole(int $adminId): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT user.*, role.name as role_name FROM user
                LEFT JOIN role ON user.role_id = role.id
                WHERE role_id = 8 || role_id = 9 || role_id = 10 || role_id = 11";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(":userId", $adminId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}