<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\User;
use App\Models\Warehouse\Item;
use App\Models\Warehouse\Order;
use App\Models\Warehouse\Mail;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;
use Exception;

/**
 * Controller for handling warehouse user-related actions.
 */
class Supervisors extends Controller
{
    public function __construct(private User $userModel, private Item $itemModel, private Order $orderModel, private Mail $mailer){}

    // Supervisor name section seelction
    public function dashboard(): Response
    {
        $supervisorId = $_SESSION['user_id'];
        
        $orders = $this->orderModel->getPendingSupervisorOrders($supervisorId);

        $pendings = $this->orderModel->getAllPendingWarehouseOrders($supervisorId);

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Supervisor Dashboard",
                                                                                "heading" => "Supervisor Dashboard"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/dashboard.php", ["orders" => $orders, "pendings" => $pendings]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Supervisor can cancel a request. The order gets deleted
    public function cancel(string $id) 
    {
        $success = $this->orderModel->denyUserOrder($id);

        if ($success) {
            return $this->redirect("/warehouse/supervisors/cancelrequest");
        } else {
            return $this->redirect("/warehouse/supervisors/dashboard");
        }
    }

    // Cancel success page.
    public function cancelSuccess()
    {
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Order Canceled",
                                                                                "heading" => "Order Canceled"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/order_canceled.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function section(): Response
    {
        $sections = $this->userModel->getSections();

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Section Select",
                                                                               "heading" => "Select Your Section"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/section.php", ["sections" => $sections]));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function items(): Response
    {
        // Extract search parameters from GET or POST
        $search = $this->request->post['search'] ?? $this->request->get['search'] ?? '';
        $itemType = $this->request->post['item_type'] ?? $this->request->get['item_type'] ?? '';
        $sort = $this->request->post['sort'] ?? $this->request->get['sort'] ?? 'name';
        $order = $this->request->post['order'] ?? $this->request->get['order'] ?? 'asc';

        $itemTypes = $this->itemModel->getItemTypes();

        if ($search || $itemType) {
            // Perform search query
            $items = $this->itemModel->searchItems($search, $itemType, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $items = $this->itemModel->getAllItems($sort, $order);
        }

        // Get previously selected items and quantities from the session
        $selectedItems = $_SESSION['selected_items'] ?? [];

        // Handle form submission to add item to the cart
        if ($this->request->method === 'POST' && isset($this->request->post['item_id']) && isset($this->request->post['quantity'])) {
            $itemId = $this->request->post['item_id'];
            $quantity = (int)$this->request->post['quantity'];

            if ($quantity > 0) {
                // Add or update the item in the session if quantity is greater than zero
                $item = $this->itemModel->getItemById($itemId);
                $item['quantity'] = $quantity;
                $selectedItems[$itemId] = $item;
            } else {
                // Remove the item if quantity is zero
                unset($selectedItems[$itemId]);
            }

            // Update the session with the selected items
            $_SESSION['selected_items'] = $selectedItems;
        }

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "WSR",
                                                                                "heading" => "WSR Supplies"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/supervisors/form.php", ["items" => $items,
                                                                                            "itemTypes" => $itemTypes,
                                                                                            "selectedItems" => $selectedItems,
                                                                                            "search" => $search,
                                                                                            "itemType" => $itemType,
                                                                                            "sort" => $sort,
                                                                                            "order" => $order]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    public function verify(): Response
    {
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Verify Request",
                                                                                "heading" => "Verify Your Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/verify.php", ['section' => $section, 'items' => $items]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function update(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $items = $_SESSION['selected_items'] ?? [];

            foreach ($_POST['items'] as $index => $item) {
                if ($_POST['action'] === 'update') {
                    if ($item['quantity'] == 0) {
                        // Remove item if quantity is 0
                        unset($items[$index]);
                    } else {
                        // Update quantity
                        $items[$index]['quantity'] = $item['quantity'];
                    }
                } elseif ($_POST['action'] === 'remove') {
                    // Remove item
                    unset($items[$index]);
                }
            }

            // Update the session with modified items
            $_SESSION['selected_items'] = array_values($items);
        }

        // Redirect back to the verify page
        header('Location: /warehouse/supervisors/verify');
        exit;
    }

    public function submit(): Response
    {
        // Confirmation email information
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];
        $supervisorEmail = $this->userModel->getSupervisorEmail($_SESSION['user_id']);
        $supervisorEmail = $supervisorEmail['email'];
        $section = $section['name'];

        // Get all warehouse managers to email request
        $warehouseManagers = $this->userModel->getWarehouseManagers();

        try {
            $this->orderModel->submitSupervisorOrder();
    
            // Send an email confirmation to the Supervisor
            $this->mailer->emailConfirmation($section, $items, $supervisorEmail);
            
            // Send Email to warehouse manager
            $this->mailer->sendNewRequestToWarehouse($warehouseManagers);

            // Remove items from cart
            unset($_SESSION['selected_section'], $_SESSION['selected_items']);
    
            return $this->redirect('/warehouse/supervisors/success');
    
        } catch (Exception $e) {
            $this->response->setBody('Failed to submit order: ' . $e->getMessage());
            return $this->response;
        }
    }
    

    public function success(): Response
    {
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Next Steps",
                                                                                "heading" => "Next Steps"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/success.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

/***** Manage Requests ***************************************************************************************/

    private function getOrderID(string $id): array
    {
        // Assign this model's id to the $order variable to the 
        $order = $this->orderModel->getOne($id);

        // Verify if the order was found
        if ($order === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $order;
    }

    public function viewOrder(string $id): Response
    {
        $order = $this->orderModel->getOrderById($id);

       // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Approve Deny", "heading" => "Order Details"]));

        // Render the order details view and pass the order data
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/approve_deny.php", ["order" => $order]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function approveOrder(string $id): Response
    {

        // Get all warehouse managers to email request
        $warehouseManagers = $this->userModel->getWarehouseManagers();
        
        $success = $this->orderModel->approveUserOrder($id);

        if ($success) {

            // Send Email to warehouse manager
            $this->mailer->sendNewRequestToWarehouse($warehouseManagers);
            
            // Redirect to a success page or the dashboard
            return $this->redirect('/warehouse/supervisors/dashboard');
        } else {
            // Handle failure case
            throw new FailedProcessingRequest("Failed to submit order");
        }
    }

    public function denyOrder(string $id): Response
    {
        $order = $this->getOrderID($id);

        $this->orderModel->deleteRecord($id);

        return $this->redirect("/warehouse/supervisors/dashboard");
    }
}