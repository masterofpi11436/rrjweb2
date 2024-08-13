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

    // Populate the drop down menu with the list of supervisors
    public function getSupervisors()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->userTable} WHERE role_id = 9 ORDER BY last_name";

        $stmt = $conn->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSupervisorById(string $id): array|bool
    {
        $conn = $this->db->getConn();

        $sql = "SELECT * FROM {$this->userTable} WHERE id = :id AND role_id = 9";

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
}