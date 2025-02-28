<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;

class User extends Model
{
    // Override the table name if the class name and table name does not match
    protected $userTable = "user";
    protected $sectionTable = "section";

    // Populate the drop down menu with the list of supervisors includes warehouse personnel to submit orderes themselves
    public function getSupervisors()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->userTable} WHERE warehouse_role = 9 OR warehouse_role = 12 ORDER BY last_name";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupervisorsAndManagers()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->userTable} WHERE warehouse_role = 9 || warehouse_role = 8 || warehouse_role = 11 || warehouse_role = 12 ORDER BY last_name";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupervisorById(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->userTable} WHERE id = :id AND (warehouse_role = 9 OR warehouse_role = 8 OR warehouse_role = 11 OR warehouse_role = 12)";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Populate the drop down menu with the list of sections
    public function getSections()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->sectionTable}";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSectionById(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->sectionTable} WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSupervisorEmail($id): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT email FROM {$this->userTable} WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getWarehouseManagers(): array
    {
        $conn = $this->db->getConn();
        $sql = "SELECT email FROM {$this->userTable} WHERE warehouse_role = 8 or warehouse_role = 11";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}