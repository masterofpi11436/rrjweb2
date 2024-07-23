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

                $stmt = $conn->prepare("INSERT INTO `{$this->table}` (user_id, supervisor_id, section_id, items, status) VALUES (:user_id, :supervisor_id, :section_id, :items, 'pending supervisor approval')");

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

                $stmt = $conn->prepare("INSERT INTO `{$this->table}` (user_id, supervisor_id, section_id, items, status) VALUES (:user_id, :supervisor_id, :section_id, :items, 'pending warehouse approval')");

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

    // Get all pending orders
    public function getAllPendingOrders(): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT 
                    orders.id, 
                    orders.user_id, 
                    orders.supervisor_id, 
                    orders.section_id, 
                    orders.items, 
                    orders.status, 
                    orders.created_at, 
                    orders.approved_denied_at, 
                    orders.approved_denied_by,
                    user.first_name AS user_first_name, 
                    user.last_name AS user_last_name, 
                    supervisor.first_name AS supervisor_first_name, 
                    supervisor.last_name AS supervisor_last_name,
                    section.name AS section_name
                FROM 
                    orders
                JOIN 
                    user ON orders.user_id = user.id
                JOIN 
                    user AS supervisor ON orders.supervisor_id = supervisor.id
                JOIN 
                    section ON orders.section_id = section.id
                WHERE 
                    orders.status = 'pending warehouse approval'";
            
        $stmt = $conn->prepare($sql);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPendingOrder(string $id): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT 
                    orders.id, 
                    orders.user_id, 
                    orders.supervisor_id, 
                    orders.section_id, 
                    orders.items, 
                    orders.status, 
                    orders.created_at, 
                    orders.approved_denied_at, 
                    orders.approved_denied_by,
                    user.first_name AS user_first_name, 
                    user.last_name AS user_last_name, 
                    supervisor.first_name AS supervisor_first_name, 
                    supervisor.last_name AS supervisor_last_name,
                    section.name AS section_name
                FROM 
                    orders
                JOIN 
                    user ON orders.user_id = user.id
                JOIN 
                    user AS supervisor ON orders.supervisor_id = supervisor.id
                JOIN 
                    section ON orders.section_id = section.id
                WHERE 
                    orders.id = :id";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order) {
            $order['items'] = json_decode($order['items'], true);
        }

        return $order;
    }

    // Order is approved
    public function approveOrder(string $id, int $userId): bool
    {
        $conn = $this->db->getConn();

        $sql = "UPDATE orders 
                SET status = 'approved', 
                    approved_denied_by = :userId, 
                    approved_denied_at = NOW() 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Order is denied
    public function denyOrder(string $id, int $userId): bool
    {
        $conn = $this->db->getConn();

        $sql = "UPDATE orders 
                SET status = 'denied', 
                    approved_denied_by = :userId, 
                    approved_denied_at = NOW() 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

        return $stmt->execute();
    }
}