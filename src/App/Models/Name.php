<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Name extends Model
{
    // Fetch all records from both tables
    public function getAll()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT inmate_number, first_name, last_name, 'tablet' AS source FROM tablet
                  UNION ALL
                  SELECT inmate_number, first_name, last_name, 'mailroom' AS source FROM mailroom";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search names in both tables
    public function searchNames(string $search): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT inmate_number, first_name, last_name, 'tablet' AS source FROM tablet WHERE first_name LIKE :search OR last_name LIKE :search
                  UNION ALL
                  SELECT inmate_number, first_name, last_name, 'mailroom' AS source FROM mailroom WHERE first_name LIKE :search OR last_name LIKE :search";

        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}