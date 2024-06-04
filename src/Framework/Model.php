<?php

// Enforce type checking
declare(strict_types=1);

namespace Framework;

use PDO;
use App\Database;

abstract class Model
{
    // Get the table name dynamically
    protected $table;

    // Array to store error messages
    protected array $errorMessage = [];

    // Using dependancy injection to get the database object
    public function __construct(protected Database $db){}

    // Placeholder method to be overridden in child classes for empty fields
    protected function validateNull(array $data): void{}

    // Dynamically get the table name based on the class name
    protected function getTableName(): string
    {
        // Check if the table name is explicitly set in the child class
        if ($this->table !== null) {

            return $this->table;
        }

        // Get the class name parts
        $parts = explode("\\", $this::class);

        // Return the class name in lowercase as the table name
        return strtolower(array_pop($parts));
    }

    // Fetch all records from the table
    public function getAll()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()}";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch a single record by ID
    public function getOne(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // Get the last inserted ID
    public function getInsertID(): string
    {
        $conn = $this->db->getConn();

        return $conn->lastInsertId();
    }

    // Add an error message for a specific field
    protected function addError(string $field, string $message): void
    {
        $this->errorMessage[$field] = $message;
    }

    // Get all error messages
    public function getErrors(): array
    {
        return $this->errorMessage;
    }

    // Insert a new record into the table
    public function insertRecord($data): bool
    {
        // Validate the data
        $this->validateNull($data);

        if (!empty($this->errorMessage)) {

            return false;

        }
        $conn = $this->db->getConn();

        $columns = implode(", ", array_keys($data));

        $values = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$this->getTableName()} ($columns) VALUES ($values)";

        $stmt = $conn->prepare($sql);

        $i = 1;

        foreach ($data as $value) {

            $type = match(gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };

            $stmt->bindValue($i++, $value, $type);

        }    

        return $stmt->execute();
    }

    public function updateRecord(string $id, array $data): bool
    {
        // Validate the data
        // $this->validateForm($data);

        // if (!empty($this->errorMessage)) {

        //     return false;

        // }

        $sql = "UPDATE {$this->getTableName()} ";

        unset($data["id"]);

        $assignments = array_keys($data);

        array_walk($assignments, function(&$value) {

            $value = "$value = ?";

        });

        $sql .= " SET " . implode(", ", $assignments);

        $sql .= " WHERE id = ?";

        $conn = $this->db->getConn();

        $stmt = $conn->prepare($sql);

        $i = 1;

        foreach ($data as $value) {

            $type = match(gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };

            $stmt->bindValue($i++, $value, $type);

        }

        $stmt->bindValue($i, $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function deleteRecord(string $id): bool
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";

        $conn = $this->db->getConn();

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(":id", $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}