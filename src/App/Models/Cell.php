<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Cell extends Model
{
    // Override the cell name if the class name and table name does not match
    // protected $table = "cell";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    // protected function validateForm(array $data): void
    // {
    //     if (empty($data["name"])) {

    //         $this->addError("name", "Name is required!");
    //     }

    //     if (empty($data["extension"])) {

    //         $this->addError("extension", "Extension is required!");
    //     }
    // }

    public function searchCells(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE name LIKE :search OR description LIKE :search OR pid LIKE :search OR phone LIKE :search OR email LIKE :search";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}