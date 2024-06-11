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
        if (empty($data["name"])) {

            $this->addError("name", "Name is required!");
        }

        if (empty($data["extension"])) {

            $this->addError("extension", "Extension is required!");
        }
    }

    public function getAll(string $sort = 'name', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        // Validate the sorting parameters
        $validColumns = ['name', 'title', 'section', 'extension'];
        if (!in_array($sort, $validColumns)) {
            $sort = 'name'; // Default to 'name' if an invalid column is provided
        }
        $order = ($order === 'desc') ? 'desc' : 'asc'; // Ensure order is either 'asc' or 'desc'

        $sql = "SELECT * FROM {$this->getTableName()} ORDER BY {$sort} {$order}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchPhones(string $search, string $sort = 'name', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        // Validate the sorting parameters
        $validColumns = ['name', 'title', 'section', 'extension'];
        if (!in_array($sort, $validColumns)) {
            $sort = 'name'; // Default to 'name' if an invalid column is provided
        }
        $order = ($order === 'desc') ? 'desc' : 'asc'; // Ensure order is either 'asc' or 'desc'

        $sql = "SELECT * FROM {$this->getTableName()} 
                WHERE section LIKE :search OR name LIKE :search OR title LIKE :search OR extension LIKE :search 
                ORDER BY {$sort} {$order}";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}