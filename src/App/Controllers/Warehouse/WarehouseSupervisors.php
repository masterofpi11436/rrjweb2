<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Order;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling admin-related actions.
 */
class WarehouseSupervisors extends Controller
{
/**
     * Constructor.
     *
     * @param Admin $model The admin model
     */
    public function __construct(private Order $orderModel){}

    public function dashboard(): Response
    {
        $orders = $this->orderModel->getAllPendingOrders();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "WSR Supervisor Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Warehouse/WarehouseSupervisors/dashboard.php", ["orders" => $orders]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;

    }
    
    private function getOrderID(string $id): array
    {
        // Assign this model's id to the $admin variable to the 
        $order = $this->orderModel->getOne($id);

        // Verify if the admin was found
        if ($order === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $order;
    }

    // Request for approval
    public function viewOrder(string $id): Response
    {
        $order = $this->orderModel->getPendingOrder($id);
    
        if (!$order) {
            // Handle case where order is not found
            return $this->response->redirect('/warehouse/dashboard');
        }
    
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "View Order", "heading" => "Order Details"]));
    
        // Render the order details
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/one.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }

    // Method to get the logged-in user ID (you need to implement this based on your authentication system)
    private function getLoggedInUserId(): int
    {
        return $_SESSION['user_id'];
    }

    // Warehouse manager is asked if they want to print the request
    public function approvePrint(string $id): Response
    {
        $order = $this->orderModel->getPendingOrder($id);

        if (!$order) {
            // Handle case where order is not found
            return $this->response->redirect('/warehouse/dashboard');
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Print Order", "heading" => "Print the Request?"]));
    
        // Render the order details
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/print.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }
        
    // Order is approved
    public function approveOrder(string $id): Response
    {
        // Get the logged-in user ID (this assumes you have a way to get the logged-in user ID)
        $userId = $this->getLoggedInUserId();

        $success = $this->orderModel->approveOrder($id, $userId);

        $requestorEmail = $this->orderModel->getSupervisorEmail($id);

        if ($success) {
            // Email the supervisor that their order was approved
            $this->mailer->sendApproved($requestorEmail);
            // Redirect to a success page or the dashboard
            return $this->redirect('/warehouse/dashboard');
        } else {
            // Handle failure case
            throw new FailedProcessingRequest("Failed to submit order");
        }
    }

    // Display the form to add a denial note
    public function deny(string $id): Response
    {
        $order = $this->orderModel->getOne($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Note", "heading" => "Add Denial Reason"]));

        // Render the order details
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/deny_note.php", ["order" => $order]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Process the denial, add the note, and delete the order
    public function denyOrder(string $id): Response
    {
        // Get the logged-in user ID to say who denied the order
        $userId = $this->getLoggedInUserId();

        // Not to be added to the order and email
        $note = $_POST['note'] ?? '';

        // Add the denial note to the order
        $success = $this->orderModel->addDenyNoteAndSetDeniedStatus($id, $userId, $note);
        $requestorEmail = $this->orderModel->getSupervisorEmail($id);

        if ($success) {
            
            $this->mailer->sendDenied($requestorEmail, $note);
            return $this->redirect('/warehouse/dashboard');
        } else {
            // Handle failure case
            throw new FailedProcessingRequest("Failed to submit order");
        }
    }

    // Page for the warehouse manager to edit the order
    public function editOrder(string $id): Response
    {
        $order = $this->orderModel->getOrderForEdit($id);
    
        if (!$order) {
            return $this->response->redirect('/warehouse/admins/dashboard');
        }
    
        $itemTypes = $this->itemModel->getItemTypes();
    
        // Check if a search query is present
        $searchQuery = $_GET['search'] ?? ($_POST['search'] ?? '');
        if (!empty($searchQuery)) {
            $items = $this->itemModel->searchItems($searchQuery);
        } else {
            $items = $this->itemModel->getAllItems();
        }
    
        // Store the current order items in the session if not already set
        if (!isset($_SESSION['selected_items'])) {
            $_SESSION['selected_items'] = $order['items'];
        }
    
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Order", "heading" => "Edit Order"]));
    
        // Render the edit order page
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/edit_order.php", ["order" => $order,
                                                                                                       "itemTypes" => $itemTypes,
                                                                                                       "items" => $items,
                                                                                                       "selectedItems" => $_SESSION['selected_items']]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }
    
    public function edit(string $id): Response
    {
        $order = $this->orderModel->getOne($id);
    
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Note", "heading" => "Add Denial Reason"]));
    
        // Render the order details
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/edit_note.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }
    
    public function updateOrder(string $id): Response
    {
        // Retrieve the order
        $order = $this->orderModel->getOrderForEdit($id);
    
        if (!$order) {
            return $this->response->redirect('/warehouse/admins/dashboard');
        }
    
        $note = $_POST['note'] ?? '';
        $searchQuery = $_POST['search'] ?? '';
    
        // Get previously selected items and quantities from the session
        $selectedItems = $_SESSION['selected_items'] ?? [];
    
        // Check if item_id is set in the POST request
        if (isset($_POST['item_id'])) {
            $itemId = $_POST['item_id'];
            $quantity = (int)$_POST['quantity'];
    
            // Add or update the item in the session if quantity is greater than zero
            if ($quantity > 0) {
                if (isset($order['items'][$itemId])) {
                    $order['items'][$itemId]['quantity'] = $quantity;
                } else {
                    $item = $this->itemModel->getItemById($itemId);
                    $order['items'][$itemId] = [
                        'id' => $itemId,
                        'name' => $item['name'],
                        'item_type' => $item['item_type'],
                        'quantity' => $quantity
                    ];
                }
                $selectedItems[$itemId] = $order['items'][$itemId];
            } else {
                // Remove the item if quantity is zero
                unset($order['items'][$itemId]);
                unset($selectedItems[$itemId]);
            }
    
            $_SESSION['selected_items'] = $selectedItems;
        }
    
        // Update the order items and note in the database
        $updatedItems = json_encode($order['items']);
        $success = $this->orderModel->updateOrderItems($id, $updatedItems, $note);
    
        if ($success) {
            // Send email only if the note is being updated
            if (isset($_POST['update_note'])) {
                // Get the supervisor's email
                $requestorEmail = $this->orderModel->getSupervisorEmail($id);
    
                // Send email with the note
                if ($requestorEmail) {
                    $this->mailer->sendEdited($requestorEmail, $note);
                }
                
                // Redirect to the Order Details page after submitting the note
                return $this->redirect("/warehouse/managers/request/one/$id");
            }
    
            return $this->redirect("/warehouse/managers/request/edit/$id?search=" . urlencode($searchQuery));
        } else {
            return $this->redirect("/warehouse/managers/request/edit/$id?error=update_failed&search=" . urlencode($searchQuery));
        }
    }    
}