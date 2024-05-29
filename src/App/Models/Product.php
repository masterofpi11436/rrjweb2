<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Product extends Model
{
    // Override the table name if the class name and table name does not match
    // protected $table = "product";

    // Validate the product name and description fields for completeness
    protected function validateName(array $data): void
    {
        if (empty($data["name"])) {

            $this->addError("name", "The product must have a name");
        }

        if (empty($data["description"])) {

            $this->addError("description", "People need to know what the product is");
        }
    }

    // Retireves the Amount of records in the table
    public function getTotalProducts(): int
    {
        $sql = "SELECT COUNT(*) AS total FROM {$this->getTableName()}";

        $conn = $this->db->getConn();

        $stmt = $conn->query($sql);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return (int) $row["total"];
    }
}