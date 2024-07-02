<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Tablet extends Model
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

        if (empty($data["first_name"])) {

            $this->addError("first_name", "First name is required!");
        }
    }

    public function getAll(string $sort = 'created_at', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        // Validate the sorting parameters
        $validColumns = ['inmate_number', 'last_name', 'first_name', 'created_at', 'is_reported'];
        
        if (!in_array($sort, $validColumns)) {
            $sort = 'created_at'; // Default to 'created_at' if an invalid column is provided
        }

        $order = ($order === 'asc') ? 'desc' : 'asc'; // Ensure order is either 'asc' or 'desc'

        $sql = "SELECT * FROM {$this->getTableName()} ORDER BY {$sort} {$order}";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function searchTablets(string $search, string $sort = 'created_at', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        // Validate the sorting parameters
        $validColumns = ['inmate_number', 'last_name', 'first_name', 'created_at', 'is_reported'];
        if (!in_array($sort, $validColumns)) {
            $sort = 'created_at'; // Default to 'name' if an invalid column is provided
        }

        $order = ($order === 'desc') ? 'desc' : 'asc'; // Ensure order is either 'asc' or 'desc'

        $sql = "SELECT * FROM {$this->getTableName()} 
                WHERE inmate_number LIKE :search OR first_name LIKE :search OR last_name LIKE :search 
                ORDER BY {$sort} {$order}";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}