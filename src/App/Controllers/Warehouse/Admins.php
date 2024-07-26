<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Admin;
use App\Models\Warehouse\Order;
use App\Models\Warehouse\Item;
use App\Models\Warehouse\Section;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling admin-related actions.
 */
class Admins extends Controller
{
/**
     * Constructor.
     *
     * @param Admin $model The admin model
     */
    public function __construct(private Admin $model, private Order $orderModel, private Item $itemModel, private Section $sectionModel){}

    public function dashboard(): Response
    {
        $orders = $this->orderModel->getAllPendingOrders();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "WSR Admin Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/dashboard.php", ["orders" => $orders]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Retrieves the admin by ID.
     *
     * @param string $id The admin ID
     * @return array The admin data
     * @throws PageNotFoundException If the admin is not found
     */
    private function getAdminID(string $id): array
    {
        // Assign this model's id to the $admin variable to the 
        $admin = $this->model->getOne($id);

        // Verify if the admin was found
        if ($admin === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $admin;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $admins = $this->model->searchAdminssWithRoles($search);
        } else {
            // Retrieve all records if no search query
            $admins = $this->model->getAdminsWithRoles();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Users", "heading" => "All Users"]));

        // Render the all admins view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/all_admins.php", ["admins" => $admins]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single admin by ID.
     *
     * @param string $id The admin ID
     */
    public function viewOne(string $id)
    {
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One", "heading" => "Admin's Details"]));

        // Render the one admins view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/one_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new admin.
     */
    public function addNewAdmin()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));

        // Render the form for adding a new admin
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new admin.
     */
    public function create()
    {
        // Get the form data
        $data = [
            "first_name" => $this->request->post["first_name"],
            "last_name" => $this->request->post["last_name"],
            "email" => $this->request->post["email"],
            "password" => $this->request->post["password"],
            "role_id" => $this->request->post["role_id"]
        ];

        // Hash the password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Attempt to insert the new admin record
        if ($this->model->insertRecord($data)) {
            // Redirect to the newly created admin's page
            return $this->redirect("/warehouse/admins/one/{$this->model->getInsertID()}");
        } else {
            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing admin.
     *
     * @param string $id The admin ID
     */
    public function editAdmin(string $id)
    {
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

        // Render the edit admin view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/edit_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing admin.
     * 
     * @param string $id The admin ID
     */
    public function updateAdmin(string $id): Response
    {
        // Retrieve the admin record
        $admin = $this->getAdminID($id);

        // Get the form data and set empty fields to null
        $admin["first_name"] = $this->request->post["first_name"];
        $admin["last_name"] = $this->request->post["last_name"];
        $admin["email"] = $this->request->post["email"];
        $admin["role_id"] = $this->request->post["role_id"];

        // Check if password field is not empty before hashing and updating
        if (!empty($this->request->post["password"])) {
            $admin["password"] = $this->request->post["password"];
            $admin['password'] = password_hash($admin['password'], PASSWORD_DEFAULT);
        } else {
            // Unset password key to prevent updating it
            unset($admin['password']);
        }
        
        // Attempt to update the admin record
        if ($this->model->updateRecord($id, $admin)) {

            // Redirect to the newly created tablet's page
            return $this->redirect("/warehouse/admins/one/{$id}");
        } else {

            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Admin", "heading" => "Edit Admin"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/edit_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $admin]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a admin.
     *
     * @param string $id The admin ID
     */
    public function deleteAdmin($id)
    {
        // Get the ID of the record
        $admin = $this->getAdminID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/delete_admin.php", ["admin" => $admin]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a admin.
     *
     * @param string $id The admin ID
     */
    public function destroyAdmin(string $id): Response
    {
        $admin = $this->getAdminID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/admins/all");
    }

    /*********************************************************************************************************************************** */
    // Order Request Pages

    // Get ID of the order
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
    
    // Order is approved
    public function approveOrder(string $id): Response
    {
        // Get the logged-in user ID (this assumes you have a way to get the logged-in user ID)
        $userId = $this->getLoggedInUserId();

        $success = $this->orderModel->approveOrder($id, $userId);

        if ($success) {
            // Redirect to a success page or the dashboard
            return $this->redirect('/warehouse/dashboard');
        } else {
            // Handle failure case
            throw new FailedProcessingRequest("Failed to submit order");
        }
    }

    // Order is approved
    public function denyOrder(string $id): Response
    {
        // Get the logged-in user ID (this assumes you have a way to get the logged-in user ID)
        $userId = $this->getLoggedInUserId();

        $success = $this->orderModel->denyOrder($id, $userId);

        if ($success) {
            // Redirect to a success page or the dashboard
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
        $items = $this->itemModel->getAllItems();
    
        // Store the current order items in the session if not already set
        if (!isset($_SESSION['selected_items'])) {
            $_SESSION['selected_items'] = $order['items'];
        }
    
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Order", "heading" => "Edit Order"]));
    
        // Render the edit order page
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/edit_order.php", [
            "order" => $order,
            "itemTypes" => $itemTypes,
            "items" => $items,
            "selectedItems" => $_SESSION['selected_items']
        ]));
    
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
    
        $itemId = $_POST['item_id'];
        $quantity = (int)$_POST['quantity'];
    
        // Get previously selected items and quantities from the session
        $selectedItems = $_SESSION['selected_items'] ?? [];
    
        if ($quantity > 0) {
            // Add or update the item in the session if quantity is greater than zero
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
    
        // Update the order items in the database
        $updatedItems = json_encode($order['items']);
        $success = $this->orderModel->updateOrderItems($id, $updatedItems);
    
        if ($success) {
            return $this->redirect("/warehouse/managers/request/edit/$id");
        } else {
            return $this->response->redirect("/warehouse/managers/request/edit/$id?error=update_failed");
        }
    }

    /*********************************************************************************************************************************** */
    // History Pages

    // Main History Page
    public function historyDashboard(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "History", "heading" => "HistoryDashboard"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/history_dashboard.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php"));

        return $this->response;
    }

    public function yearly(): Response
    {
        $orders = $this->orderModel->yearlyReport();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Yearly", "heading" => "Yearly Report (365 days)"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/yearly.php", ["orders" => $orders]));

        $this->response->appendBody($this->viewer->render("shared/footer.php"));

        return $this->response;
    }

    public function monthly(): Response
    {
        $sections = $this->sectionModel->getAll();
    
        $sectionId = $_GET['section_id'] ?? '';
    
        $orders = $this->orderModel->monthlyReport($sectionId);
    
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Monthly", "heading" => "Section Items (30 Days)"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/monthly.php", [
            "orders" => $orders, 
            "sections" => $sections,
            "section_id" => $sectionId
        ]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    public function denied(): Response
    {
        $orders = $this->orderModel->deniedReport();
    
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Denied", "heading" => "Denied Requests"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/denied_requests.php", ["orders" => $orders]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    public function deniedOne(string $id): Response
    {
        $order = $this->orderModel->denyOne($id);
    
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Denied", "heading" => "Denied Requests"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/denied_one.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }
}