<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models;

use Framework\Model;
use PDO;

class Tablet extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "tablet";

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
}