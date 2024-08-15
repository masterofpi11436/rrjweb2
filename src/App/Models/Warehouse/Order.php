<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Models\Warehouse;

use Framework\Model;
use App\Models\Section;
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

                echo "Order submitted successfully.";
            } catch (Exception $e) {
                $conn->rollBack();
                throw new Exception("Failed to submit order: " . $e->getMessage());
            }
        } else {
            throw new Exception("Incomplete order data.");
        }
    }

    /*********** Warehouse Manager Pages ********************************************************************************************************************** */
    
    // Get all pending orders to display in the dashboard
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

    // Gets one order based on ID
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
                    orders.id = :id AND status = 'pending warehouse approval'";
                
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

    // Adding note to denied order
    // Add the denial note to the order and then delete the order
    public function addDenyNoteAndSetDeniedStatus(string $id, int $userId, string $note): bool
    {
        $conn = $this->db->getConn();

        try {
            $conn->beginTransaction();

            // Add the denial note
            $sql = "UPDATE orders 
                    SET note = :note, 
                        status = 'denied', 
                        approved_denied_by = :userId, 
                        approved_denied_at = NOW() 
                    WHERE id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_STR);
            $stmt->bindParam(':note', $note, PDO::PARAM_STR);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->execute();

            $conn->commit();
            return true;
        } catch (PDOException $e) {
            $conn->rollBack();
            error_log("Database error: " . $e->getMessage());
            return false;
        }
    }

    // Return the email as a string
    public function getSupervisorEmail(string $order_id): ?string
    {
        $conn = $this->db->getConn();
    
        $sql = "SELECT u.email
                FROM orders o
                JOIN user u ON o.supervisor_id = u.id
                WHERE o.id = :order_id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $order_id, PDO::PARAM_STR);
        $stmt->execute();
    
        $email = $stmt->fetchColumn();
    
        return $email !== false ? $email : null;
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

    public function searchItems(string $query): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT id, name, item_type FROM items WHERE name LIKE :query";
        $stmt = $conn->prepare($sql);
        $searchTerm = '%' . $query . '%';
        $stmt->bindParam(':query', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Warehouse Manager edit the request
    public function getOrderForEdit(string $id): array
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

    // Update the order that was edited
    public function updateOrderItems(string $id, string $items, string $note): bool
    {
        $conn = $this->db->getConn();
    
        $sql = "UPDATE orders 
                SET items = :items,
                    note = :note
                WHERE id = :id";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':items', $items, PDO::PARAM_STR);
        $stmt->bindParam(':note', $note, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    /*********** Warehouse Reports ********************************************************************************************************************** */

    public function yearlyReport(): array
    {
        $conn = $this->db->getConn();
    
        $sql = "SELECT item.id, item.name, SUM(CAST(JSON_UNQUOTE(JSON_EXTRACT(items, CONCAT('$.\"', item.id, '\".quantity'))) AS UNSIGNED)) AS total_quantity
                FROM orders
                JOIN item ON JSON_CONTAINS_PATH(items, 'one', CONCAT('$.\"', item.id, '\"'))
                WHERE orders.status = 'approved' AND orders.approved_denied_at >= NOW() - INTERVAL 365 DAY
                GROUP BY item.id, item.name";
    
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $orders;
    }

    public function monthlyReport($sectionId, $selectedMonth): array
    {
        $conn = $this->db->getConn();
    
        $sql = "SELECT section.name as section_name, item.id, item.name, SUM(CAST(JSON_UNQUOTE(JSON_EXTRACT(items, CONCAT('$.\"', item.id, '\".quantity'))) AS UNSIGNED)) AS total_quantity
                FROM orders
                JOIN item ON JSON_CONTAINS_PATH(items, 'one', CONCAT('$.\"', item.id, '\"'))
                JOIN section ON orders.section_id = section.id
                WHERE orders.status = 'approved' AND DATE_FORMAT(orders.approved_denied_at, '%Y-%m') = :selected_month";
    
        if ($sectionId) {
            $sql .= " AND orders.section_id = :section_id";
        }
    
        $sql .= " GROUP BY section.name, item.id, item.name";
    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':selected_month', $selectedMonth, PDO::PARAM_STR);
        if ($sectionId) {
            $stmt->bindParam(':section_id', $sectionId, PDO::PARAM_INT);
        }
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $orders;
    }

    public function approvedReport($week = null, $year = null, $section_id = null)
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
                    orders.status = 'approved'";
    
        if ($week !== null && $year !== null) {
            $sql .= " AND WEEKOFYEAR(orders.created_at) = :week AND YEAR(orders.created_at) = :year";
        }
    
        if ($section_id !== null) {
            $sql .= " AND orders.section_id = :section_id";
        }
    
        $sql .= " ORDER BY orders.approved_denied_at DESC";
    
        $stmt = $conn->prepare($sql);
    
        if ($week !== null && $year !== null) {
            $stmt->bindParam(':week', $week, PDO::PARAM_INT);
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
        }
    
        if ($section_id !== null) {
            $stmt->bindParam(':section_id', $section_id, PDO::PARAM_INT);
        }
    
        $stmt->execute();
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function apprveOne(string $id)
    {
        $conn = $this->db->getConn();

        $sql = "SELECT 
                orders.id, 
                orders.user_id, 
                orders.supervisor_id,
                orders.approved_denied_by, 
                orders.section_id, 
                orders.items, 
                orders.status, 
                orders.created_at, 
                orders.approved_denied_at,
                orders.note,
                user.first_name AS user_first_name, 
                user.last_name AS user_last_name, 
                supervisor.first_name AS supervisor_first_name, 
                supervisor.last_name AS supervisor_last_name,
                warehouse.first_name AS warehouse_first_name,
                warehouse.last_name AS warehouse_last_name,
                section.name AS section_name
            FROM 
                orders
            JOIN 
                user ON orders.user_id = user.id
            JOIN 
                user AS supervisor ON orders.supervisor_id = supervisor.id
            JOIN
                user AS warehouse ON orders.approved_denied_by = warehouse.id
            JOIN 
                section ON orders.section_id = section.id
            WHERE 
                orders.id = :id AND orders.status = 'approved'";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order) {
            $order['items'] = json_decode($order['items'], true);
        }

        return $order;
    }

    public function deniedReport()
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
                    orders.status = 'denied'";

        $stmt = $conn->prepare($sql);
                
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function denyOne(string $id)
    {
        $conn = $this->db->getConn();

        $sql = "SELECT 
                orders.id, 
                orders.user_id, 
                orders.supervisor_id,
                orders.approved_denied_by, 
                orders.section_id, 
                orders.items, 
                orders.status, 
                orders.created_at, 
                orders.approved_denied_at,
                orders.note,
                user.first_name AS user_first_name, 
                user.last_name AS user_last_name, 
                supervisor.first_name AS supervisor_first_name, 
                supervisor.last_name AS supervisor_last_name,
                warehouse.first_name AS warehouse_first_name,
                warehouse.last_name AS warehouse_last_name,
                section.name AS section_name
            FROM 
                orders
            JOIN 
                user ON orders.user_id = user.id
            JOIN 
                user AS supervisor ON orders.supervisor_id = supervisor.id
            JOIN
                user AS warehouse ON orders.approved_denied_by = warehouse.id
            JOIN 
                section ON orders.section_id = section.id
            WHERE 
                orders.id = :id AND orders.status = 'denied'";
                
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order) {
            $order['items'] = json_decode($order['items'], true);
        }

        return $order;
    }

    /*********** Warehouse Supervisor Pages ********************************************************************************************************************** */

    public function getPendingSupervisorOrders($supervisorId): array
    {
        $conn = $this->db->getConn();

        $sql = "SELECT orders.id, orders.status, orders.created_at, user.first_name AS user_first_name, user.last_name AS user_last_name, section.name AS section_name
                FROM orders
                JOIN user ON orders.user_id = user.id
                JOIN section ON orders.section_id = section.id
                WHERE orders.supervisor_id = :supervisor_id AND orders.status = 'pending supervisor approval'";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':supervisor_id', $supervisorId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPendingWarehouseOrders($supervisorId): array
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
                    orders.supervisor_id = :supervisor_id AND orders.status = 'pending warehouse approval'";
            
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':supervisor_id', $supervisorId, PDO::PARAM_INT);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById(string $id): array
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
                    section.name AS section_name
                FROM 
                    orders
                JOIN 
                    user ON orders.user_id = user.id
                JOIN 
                    section ON orders.section_id = section.id
                WHERE 
                    orders.id = :id";
                    
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $order = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($order) {
            $order['items'] = json_decode($order['items'], true);
            return $order;
        }

        return [];
    }

    // Order is approved
    public function approveUserOrder(string $id): bool
    {
        $conn = $this->db->getConn();

        $sql = "UPDATE orders 
                SET status = 'pending warehouse approval'
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Order is denied and deleted
    public function denyUserOrder(string $id): bool
    {
        $conn = $this->db->getConn();

        $sql = "DELETE FROM orders 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        return $stmt->execute();
    }
}