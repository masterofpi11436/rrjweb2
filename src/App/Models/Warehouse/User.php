<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;

class Admin extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "user";

    public function getSupervisor()
    {
        $conn = $this->db->getConn();
    }
}