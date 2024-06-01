<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Phone extends Model
{
    // Override the phone name if the class name and table name does not match
    // protected $phone = "phone";

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

    public function searchPhones(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE section LIKE :search OR name LIKE :search OR title LIKE :search OR extension LIKE :search";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}