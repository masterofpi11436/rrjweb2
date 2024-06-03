<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;

class User extends Model
{
    // Override the table name if the class name and table name does not match
    // protected $table = "tablet";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    protected function validateForm(array $data): void
    {
        if (empty($data["inmate_number"])) {

            $this->addError("inmate_number", "Inmate number is required!");
        }

        if (empty($data["last_name"])) {

            $this->addError("last_name", "Last name is required!");
        }
    }

    public function searchUsers(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE first_name LIKE :search OR last_name LIKE :search OR email LIKE :search";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}