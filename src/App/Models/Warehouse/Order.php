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
        // Fetch data from session
        $userId = $_SESSION['user_id'] ?? null;
        $supervisorId = $_SESSION['selected_supervisor'] ?? null;
        $sectionId = $_SESSION['selected_section']['id'] ?? null;
        $items = $_SESSION['selected_items'] ?? [];

        // Ensure all necessary data is available
        if ($userId && $supervisorId && $sectionId && !empty($items)) {

            try {
                $conn = $this->db->getConn();
            
                // Begin transaction
                $conn->beginTransaction();
            
                // Serialize the items array to JSON
                $itemsJson = json_encode($items);
            
                // Prepare the SQL statement
                $stmt = $conn->prepare("INSERT INTO `{$this->table}` (user_id, supervisor_id, section_id, items, status) VALUES (:user_id, :supervisor_id, :section_id, :items, 'pending')");
            
                // Debugging: Print the items array
                var_dump($items);
            
                // Bind values
                $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
                $stmt->bindValue(':supervisor_id', $supervisorId, PDO::PARAM_INT);
                $stmt->bindValue(':section_id', $sectionId, PDO::PARAM_INT);
                $stmt->bindValue(':items', $itemsJson, PDO::PARAM_STR);
            
                // Execute the statement
                $stmt->execute();
            
                // Commit transaction
                $conn->commit();
            
                // Clear session data after successful insertion
                unset($_SESSION['selected_section'], $_SESSION['selected_items']);
            
                echo "Order submitted successfully.";
            } catch (Exception $e) {
                // Rollback transaction on error
                $conn->rollBack();
                throw new Exception("Failed to submit order: " . $e->getMessage());
            }
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
}