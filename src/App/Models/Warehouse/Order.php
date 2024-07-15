<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use PDO;
use Exception;

class Order extends Model
{
    // Override the table name if the class name and table name does not match
    protected $table = "orders";

    public function submitUserOrder()
    {
        $userId = $_SESSION['user_id'] ?? null;
        $supervisorId = $_SESSION['selected_supervisor']['id'] ?? null;
        $sectionId = $_SESSION['selected_section']['id'] ?? null;
        $items = $_SESSION['selected_items'] ?? [];

        if ($userId && $supervisorId && $sectionId && !empty($items)) {
            try {
                $conn = $this->db->getConn();
                $conn->beginTransaction();

                $itemsJson = json_encode($items);

                $stmt = $conn->prepare("INSERT INTO `{$this->table}` (user_id, supervisor_id, section_id, items, status) VALUES (:user_id, :supervisor_id, :section_id, :items, 'pending')");

                $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
                $stmt->bindValue(':supervisor_id', $supervisorId, PDO::PARAM_INT);
                $stmt->bindValue(':section_id', $sectionId, PDO::PARAM_INT);
                $stmt->bindValue(':items', $itemsJson, PDO::PARAM_STR);

                $stmt->execute();

                $conn->commit();

                unset($_SESSION['selected_section'], $_SESSION['selected_items']);

                echo "Order submitted successfully.";
            } catch (Exception $e) {
                $conn->rollBack();
                throw new Exception("Failed to submit order: " . $e->getMessage());
            }
        } else {
            throw new Exception("Incomplete order data.");
        }
    }

    public function submitSupervisorOrder()
    {
        // Fetch data from session
        $supervisorId = $_SESSION['user_id'] ?? null; // The logged-in user is the supervisor
        $sectionId = $_SESSION['selected_section']['id'] ?? null;
        $items = $_SESSION['selected_items'] ?? [];

        if ($supervisorId && $sectionId && !empty($items)) {
            try {
                $conn = $this->db->getConn();
                $conn->beginTransaction();

                $itemsJson = json_encode($items);

                $stmt = $conn->prepare("INSERT INTO `{$this->table}` (user_id, supervisor_id, section_id, items, status) VALUES (:user_id, :supervisor_id, :section_id, :items, 'pending')");

                $stmt->bindValue(':user_id', $supervisorId, PDO::PARAM_INT); // Both user_id and supervisor_id are the supervisor's ID
                $stmt->bindValue(':supervisor_id', $supervisorId, PDO::PARAM_INT);
                $stmt->bindValue(':section_id', $sectionId, PDO::PARAM_INT);
                $stmt->bindValue(':items', $itemsJson, PDO::PARAM_STR);

                $stmt->execute();

                $conn->commit();

                unset($_SESSION['selected_section'], $_SESSION['selected_items']);

                echo "Order submitted successfully.";
            } catch (Exception $e) {
                $conn->rollBack();
                throw new Exception("Failed to submit order: " . $e->getMessage());
            }
        } else {
            throw new Exception("Incomplete order data.");
        }
    }

    // Get Orders with the last name of the user and supervisor as well as the section name
    public function getAllPendingOrders()
    {
        $conn = $this->db->getConn();

        $sql = "SELECT 
                    o.id AS order_id,
                    u1.last_name AS user_last_name,
                    u2.last_name AS supervisor_last_name,
                    s.name AS section_name,
                    o.items,
                    o.status,
                    o.created_at,
                    o.approved_at,
                    o.approved_by
                FROM 
                    orders o
                JOIN 
                    section s ON o.section_id = s.id
                JOIN 
                    user u1 ON o.user_id = u1.id
                JOIN 
                    user u2 ON o.supervisor_id = u2.id;";

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}