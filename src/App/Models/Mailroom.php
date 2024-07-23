<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Mailroom extends Model
{
    // Override the phone name if the class name and table name does not match
    // protected $table = "phone";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    protected function validateForm(array $data): void
    {
        if (empty($data["first_name"])) {

            $this->addError("first_name", "First name is required!");
        }

        if (empty($data["last_name"])) {

            $this->addError("last_name", "Last name is required!");
        }
    }

    public function getAll()

    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} ORDER BY last_name";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchNames(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE first_name LIKE :search OR last_name LIKE :search OR inmate_number LIKE :search ORDER BY last_name";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}