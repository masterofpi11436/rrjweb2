<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;

class Monthly extends Model
{
    // Override the table name if the class name and table name does not match
    // protected $table = "monthly";

    // Validate the inamte number and last name fields to allow minumum information to look up person.
    protected function validateForm(array $data): void
    {
        if (empty($data["email"])) {
            $this->addError("email", "Email is required!");
        } elseif (!filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $this->addError("email", "Invalid email format!");
        } elseif (!str_ends_with($data["email"], '@rrjva.org')) {
            $this->addError("email", "Email must end with '@rrjva.org'.");
        }

        if (empty($data["last_name"])) {
            $this->addError("last_name", "Last name is required!");
        }

        if (empty($data["first_name"])) {
            $this->addError("first_name", "First name is required!");
        }
    }

    public function getEmails(): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT email FROM monthly";

        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $mailingList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $mailingList;
    }

}