<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Programs;

use Framework\Model;
use PDO;

class Volunteer extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "program";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    // protected function validateForm(array $data): void
    // {
    //     if (empty($data["last_name"])) {

    //         $this->addError("last_name", "Last name is required!");
    //     }

    //     if (empty($data["first_name"])) {

    //         $this->addError("first_name", "First name is required!");
    //     }
    // }

    public function searchVolunteers(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE (last_name LIKE :search OR first_name LIKE :search) AND is_volunteer = 1";
        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE is_volunteer = 1 AND active_inactive_terminated = 'active' ORDER BY last_name ASC";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id AND is_volunteer = 1";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}