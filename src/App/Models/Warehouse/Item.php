<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;

class Item extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "item";

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

    public function getItemById(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchItems(string $search = '', string $itemType = '', string $sort = 'name', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT item.id, item.name, item_type.type AS item_type, item.image
                FROM item
                JOIN item_type ON item.item_type = item_type.id
                WHERE (item.name LIKE :search OR item_type.type LIKE :search)";

        if ($itemType) {
            $sql .= " AND item.item_type = :itemType";
        }

        $sql .= " ORDER BY {$sort} {$order}";

        $stmt = $conn->prepare($sql);

        $searchTerm = '%' . $search . '%';
        $stmt->bindParam(':search', $searchTerm, PDO::PARAM_STR);
        
        if ($itemType) {
            $stmt->bindParam(':itemType', $itemType, PDO::PARAM_STR);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // All Items for the User and Supervisor pages
    public function getAllItems()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT item.id, item.name, item_type.type AS item_type, item.image
                FROM item
                JOIN item_type ON item.item_type = item_type.id";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // All Items for the Admin pages
    public function getAll(string $sort = 'name', string $order = 'asc'): array
    {
        $conn = $this->db->getConn();

        // Validate the sorting parameters
        $validColumns = ['name', 'item_type'];
        if (!in_array($sort, $validColumns)) {
            $sort = 'name'; // Default to 'name' if an invalid column is provided
        }
        $order = ($order === 'desc') ? 'desc' : 'asc'; // Ensure order is either 'asc' or 'desc'

        // Map 'item_type' to 'item_type.type' for sorting
        if ($sort === 'item_type') {
            $sort = 'item_type.type';
        }

        $sql = "SELECT item.id, item.name, item_type.type AS item_type, item.image
                FROM item
                JOIN item_type ON item.item_type = item_type.id
                ORDER BY {$sort} {$order}";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get the types to display in the form
    public function getItemTypes(): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT id, type FROM item_type";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get one item with the item type:
    public function getOne(string $id): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT item.id, item.name, item_type.type AS item_type, item.image
                FROM item
                JOIN item_type ON item.item_type = item_type.id
                WHERE item.id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}