<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use Exception;
use Framework\Viewer;

use Framework\Response;
use Framework\Controller;
use App\Models\Warehouse\Item;
use App\Models\Warehouse\Mail;
use App\Models\Warehouse\User;
use App\Models\Warehouse\Admin;
use App\Models\Warehouse\Order;
use App\Models\Warehouse\Monthly;
use App\Models\Warehouse\Section;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Framework\Exceptions\PageNotFoundException;
use Framework\Exceptions\FailedProcessingRequest;

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
    public function __construct(private Admin $model, private Order $orderModel, private Item $itemModel, private Section $sectionModel, private Mail $mailer, private User $userModel, private Monthly $monthlyModel){}

    public function dashboard(): Response
    {
        // Reset Session to zero to navigate to other pages
        unset($_SESSION['selected_items']);
        unset($_SESSION['selected_supervisor']);
        unset($_SESSION['selected_section']);

        $orders = $this->orderModel->getAllPendingOrders();

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Admin Dashboard", "heading" => "WSR Admin Dashboard"]));

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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "All Users", "heading" => "All Users"]));

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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Showing One", "heading" => "Admin's Details"]));

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
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));

        // Render the form for adding a new admin
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new warehouse user
     */
    public function create()
    {
        // Get the form data
        $data = [
            "first_name" => $this->request->post["first_name"],
            "last_name" => $this->request->post["last_name"],
            "email" => $this->request->post["email"],
            "warehouse_role" => $this->request->post["role_id"]
        ];
    
        // Generate reset token and expiry time
        $resetToken = bin2hex(random_bytes(32)); // Secure token generation
        $tokenExpiry = date('Y-m-d H:i:s', strtotime('+48 hours')); // Token expires in 48 hours
    
        // Add reset token and expiry time to the data
        $data['reset_token'] = $resetToken;
        $data['token_expiry'] = $tokenExpiry;
    
        // Check if the user already exists by email
        $existingUser = $this->model->findUserByEmail($data['email']);
    
        if ($existingUser) {
            // User exists, update the warehouse_role
            $updateData = [
                'warehouse_role' => $this->request->post['role_id'],
                'reset_token' => $resetToken,
                'token_expiry' => $tokenExpiry
            ];
            if ($this->model->updateUserRecord($existingUser['id'], $updateData)) {
                $resetLink = "rrjweb2/reset_password?token=" . $resetToken;
                $this->mailer->registerEmail($data['email'], $resetLink);
    
                // Redirect to the updated user's page
                return $this->redirect("/warehouse/admins/one/{$existingUser['id']}");
            } else {
                // Render the form again with error messages
                $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));
                $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $data]));
                $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
                return $this->response;
            }
        } else {
            // User does not exist, insert new record
            
            if ($this->model->insertRecord($data)) {
                $resetLink = "rrjweb2/reset_password?token=" . $resetToken;
                $this->mailer->registerEmail($data['email'], $resetLink);
    
                // Redirect to the newly created admin's page
                return $this->redirect("/warehouse/admins/one/{$this->model->getInsertID()}");
            } else {
                // Render the form again with error messages
                $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Admin", "heading" => "Add Admin"]));
                $this->response->appendBody($this->viewer->render("Warehouse/Admins/add_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $data]));
                $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
                return $this->response;
            }
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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));

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
        $admin["warehouse_role"] = $this->request->post["role_id"];
        
        // Attempt to update the admin record
        if ($this->model->updateRecord($id, $admin)) {
            // Redirect to the updated admin's page
            return $this->redirect("/warehouse/admins/one/{$id}");
        } else {
            // Render the form again with error messages if update fails
            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Admin", "heading" => "Edit Admin"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/edit_admin.php", ["errorMessage" => $this->model->getErrors(), "admin" => $admin]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
            return $this->response;
        }
    }

    public function resetToken($id)
    {
        $userEmail = $this->model->findUserByEmailById($id);
        
        // Generate reset token and expiry time
        $resetToken = bin2hex(random_bytes(32)); // Secure token generation
        $tokenExpiry = date('Y-m-d H:i:s', strtotime('+48 hours')); // Token expires in 48 hours

        $updateData = [
            'reset_token' => $resetToken,
            'token_expiry' => $tokenExpiry
        ];

        $resetLink = "rrjweb2/reset_password?token=" . $resetToken;

        if ($this->model->updateUserRecord($id, $updateData)) {

            $this->mailer->registerEmail($userEmail['email'], $resetLink);
        }

        return $this->redirect("/warehouse/admins/resetTokenSuccess");
    }

    public function resetTokenSuccess (): Response
    {
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Admin", "heading" => "Edit Admin"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/reset_token_success.php"));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

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
    
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "View Order", "heading" => "Order Details"]));
    
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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Print Order", "heading" => "Print the Request?"]));
    
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

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Note", "heading" => "Add Denial Reason"]));

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
        // Step 1: Fetch the order
        $order = $this->orderModel->getOrderForEdit($id);
        if (!$order) {
            return $this->response->redirect('/warehouse/admins/dashboard');
        }
    
        // Step 2: Initialize or update the session with selected items
        if (!isset($_SESSION['selected_items'])) {
            $_SESSION['selected_items'] = $order['items'];
        } else {
            // Merge new items from the order into the session
            $existingItemIds = array_column($_SESSION['selected_items'], 'id');
            foreach ($order['items'] as $newItem) {
                $found = false;
                foreach ($_SESSION['selected_items'] as &$selectedItem) {
                    if ($selectedItem['id'] == $newItem['id']) {
                        $selectedItem['quantity'] = $newItem['quantity'];
                        $found = true;
                        break;
                    }
                }
                if (!$found) {
                    $_SESSION['selected_items'][] = $newItem;
                }
            }
        }
    
        // Step 3: Fetch item types
        $itemTypes = $this->itemModel->getItemTypes();
    
        // Step 4: Handle search queries or fetch all items
        $searchQuery = $_GET['search'] ?? ($_POST['search'] ?? '');
        if (!empty($searchQuery)) {
            $items = $this->itemModel->searchItemsForManagers($searchQuery);
        } else {
            $items = $this->itemModel->getAllItemsForManagers();
        }
    
        // Step 5: Render the view
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", [
            "title" => "Edit Order",
            "heading" => "Edit Order"
        ]));
    
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Requests/edit_order.php", [
            "order" => $order,
            "itemTypes" => $itemTypes,
            "items" => $items,
            "selectedItems" => $_SESSION['selected_items']
        ]));
    
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }

    public function edit(string $id): Response
    {
        $order = $this->orderModel->getOne($id);
    
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Note", "heading" => "Reson for Edit"]));
    
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
    
        // Initialize variables
        $note = $_POST['note'] ?? '';
        $searchQuery = $_POST['search'] ?? '';
        $selectedItems = $_SESSION['selected_items'] ?? [];
    
        // Check if item_id is set in the POST request
        if (isset($_POST['item_id'])) {
            $itemId = (int)$_POST['item_id'];
            $quantity = (int)$_POST['quantity'];
    
            // Find the item in the existing order or session
            $itemFound = false;
    
            // Update existing item quantities or add a new item
            foreach ($selectedItems as &$selectedItem) {
                if ($selectedItem['id'] === $itemId) {
                    if ($quantity > 0) {
                        $selectedItem['quantity'] = $quantity;
                    } else {
                        // Remove the item if quantity is zero
                        $itemFound = true;
                        unset($selectedItems[array_search($selectedItem, $selectedItems)]);
                    }
                    $itemFound = true;
                    break;
                }
            }
    
            // If the item is not found, add it
            if (!$itemFound && $quantity > 0) {
                $item = $this->itemModel->getItemById($itemId);
                if ($item) {
                    $selectedItems[] = [
                        'id' => $itemId,
                        'name' => $item['name'],
                        'item_type' => $item['item_type'],
                        'quantity' => $quantity,
                    ];
                }
            }
    
            // Update session with selected items
            $_SESSION['selected_items'] = $selectedItems;
        }
    
        // Update the order items in the database
        $updatedItems = json_encode($selectedItems);
        $success = $this->orderModel->updateOrderItems($id, $updatedItems, $note);
    
        if ($success) {
            // Send email only if the note is being updated
            if (isset($_POST['update_note'])) {
                $requestorEmail = $this->orderModel->getSupervisorEmail($id);
    
                // Send email with the note
                if ($requestorEmail) {
                    $this->mailer->sendEdited($requestorEmail, $note);
                }
    
                // Redirect to the Order Details page
                return $this->redirect("/warehouse/managers/request/one/$id");
            }
    
            // Redirect back to the edit page with the search query
            return $this->redirect("/warehouse/managers/request/edit/$id?search=" . urlencode($searchQuery));
        } else {
            return $this->redirect("/warehouse/managers/request/edit/$id?error=update_failed&search=" . urlencode($searchQuery));
        }
    }

    /*********************************************************************************************************************************** */
    // History Pages

    // Main History Page
    public function historyDashboard(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "History", "heading" => "History Dashboard"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/history_dashboard.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php"));

        return $this->response;
    }

    public function approved(): Response
    {
        if (isset($_GET['week']) && $_GET['week'] !== '') {
            list($week, $year) = explode('-', $_GET['week']);
            $week = (int)$week;
            $year = (int)$year;
        } else {
            $week = null;
            $year = null;
        }
    
        $section_id = isset($_GET['section']) && $_GET['section'] !== '' ? (int)$_GET['section'] : null;
    
        $orders = $this->orderModel->approvedReport($week, $year, $section_id);
        $sections = $this->sectionModel->getAll();
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Approved", "heading" => "Approved Reports"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/approved.php", ["orders" => $orders, "sections" => $sections]));
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }
    

    public function approvedOne(string $id): Response
    {
        $order = $this->orderModel->apprveOne($id);
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "One", "heading" => "Approved Requests"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/approved_one.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    public function yearly(): Response
    {
        $orders = $this->orderModel->yearlyReport();

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Yearly", "heading" => "Yearly Report (365 days)"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/yearly.php", ["orders" => $orders]));

        $this->response->appendBody($this->viewer->render("shared/footer.php"));

        return $this->response;
    }

    public function monthly(): Response
    {
        $sections = $this->sectionModel->getAll();
        $sectionId = $_GET['section_id'] ?? '';
    
        $currentMonth = date('Y-m');
        $selectedMonth = $_GET['month'] ?? $currentMonth;
    
        $orders = $this->orderModel->monthlyReport($sectionId, $selectedMonth);
    
        // Prepare a table structure with items as rows and sections as columns
        $tableData = [];
        $sectionNames = [];
        $itemNames = [];
        $itemTotals = [];  // Array to hold the total quantity for each item
    
        foreach ($orders as $order) {
            $itemNames[$order['item_id']] = $order['item_name'];
            $sectionNames[$order['section_id']] = $order['section_name'];
            $tableData[$order['item_id']][$order['section_id']] = $order['total_quantity'];
    
            // Calculate the total quantity for each item across all sections
            if (!isset($itemTotals[$order['item_id']])) {
                $itemTotals[$order['item_id']] = 0;
            }
            $itemTotals[$order['item_id']] += $order['total_quantity'];
        }
    
        $months = [];
        for ($i = 0; $i < 12; $i++) {
            $months[] = date('Y-m', strtotime("-$i month"));
        }
    
        $selectedSectionName = $sectionId ? $sections[array_search($sectionId, array_column($sections, 'id'))]['name'] : 'All Sections';
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Monthly", "heading" => "Monthly Reports"]));
    
        // Render the view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/monthly.php", [
            "tableData" => $tableData,
            "sectionNames" => $sectionNames,
            "itemNames" => $itemNames,
            "itemTotals" => $itemTotals,
            "sections" => $sections,
            "section_id" => $sectionId,
            "months" => $months,
            "selected_month" => $selectedMonth,
            "selected_section_name" => $selectedSectionName
        ]));
    
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    // Helper function go to get the recipient id
    private function getRecipientID(string $id): array
    {
        // Assign this model's id to the $item variable to the 
        $recipient = $this->monthlyModel->getOne($id);

        // Verify if the item was found
        if ($recipient === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $recipient;
    }

    // List of people to send the monthly report too automatically
    public function monthlyReportRecipients()
    {
        $monthly = $this->monthlyModel->getAll();

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Monthly List", "heading" => "Recipient List"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/Recipients/monthly_list.php", ['monthly' => $monthly]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    // Add a recipient
    public function addRecipient()
    {
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Recipient", "heading" => "Add Recipient"]));
        
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/Recipients/add.php"));
        
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    // Create Recipient
    public function createRecipient()
    {
        $data = [
            "first_name" => $this->request->post["first_name"],
            "last_name" => $this->request->post["last_name"],
            "email" => $this->request->post["email"]
        ];

        if ($this->monthlyModel->insertRecord($data)) {
            return $this->redirect('/warehouse/managers/history/monthly-list');
        } else {

            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Recipient", "heading" => "Add Recipient"]));
        
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/Recipients/add.php", ["errorMessage" => $this->monthlyModel->getErrors()]));
            
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
            return $this->response;
        }
    }

    // Edit a recipient
    public function editRecipient(string $id)
    {
        $recipient = $this->getRecipientID($id);
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Monthly List", "heading" => "Recipient List"]));
        
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/Recipients/edit.php", ['recipient' => $recipient]));
        
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
        
        return $this->response;
    }

    public function updateRecipient(string $id)
    {
        $recipient = $this->getRecipientID($id);

        $recipient["first_name"] = $this->request->post["first_name"];
        $recipient["last_name"] = $this->request->post["last_name"];
        $recipient["email"] = $this->request->post["email"];

        if ($this->monthlyModel->updateRecord($id, $recipient)) {
            return $this->redirect("/warehouse/managers/history/monthly-list");
        } else {

            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Item", "heading" => "Edit Item"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/Recipients/edit.php", ["errorMessage" => $this->monthlyModel->getErrors(), "recipient" => $recipient]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    // Destroy Recipient
    public function destroyRecipient($id): Response
    {
        $recipient = $this->getRecipientID($id);

        $this->monthlyModel->deleteRecord($id);

        return $this->redirect("/warehouse/managers/history/monthly-list");
    }

    // Automated spreadsheet created for the monthly report
    public function generateCSVReport(): Response
    {
        // Setting server address to trusted IP to allow task schedular to run this action method
        $trustIP = ['::1', '127.0.0.1'];

        // Exit the script if it cannot be executed

        if (!in_array($_SERVER['REMOTE_ADDR'], $trustIP)) {
            exit('Unauthorized');
        }

        // Fetch data for the previous month (same as before)
        $orders = $this->orderModel->monthlyReportPreviousMonth();
    
        // Prepare data for the CSV report (same structure as before)
        $tableData = [];
        $sectionNames = [];
        $itemNames = [];
        $itemTotals = [];
    
        foreach ($orders as $order) {
            $itemNames[$order['item_id']] = $order['item_name'];
            $sectionNames[$order['section_id']] = $order['section_name'];
            $tableData[$order['item_id']][$order['section_id']] = $order['total_quantity'];
    
            if (!isset($itemTotals[$order['item_id']])) {
                $itemTotals[$order['item_id']] = 0;
            }
            $itemTotals[$order['item_id']] += $order['total_quantity'];
        }
    
        // Define file path for saving the CSV temporarily
        $filePath = sys_get_temp_dir() . '/monthly_report.csv';
    
        // Open a file pointer for writing the CSV to disk
        $output = fopen($filePath, 'w');
    
        // Set the header row
        $headers = ['Item Name'];
        foreach ($sectionNames as $sectionName) {
            $headers[] = $sectionName;
        }
        $headers[] = 'Total'; // Add "Total" column
    
        // Write the header row to the CSV
        fputcsv($output, $headers);
    
        // Fill in the data rows
        foreach ($itemNames as $itemId => $itemName) {
            $row = [$itemName];
            foreach ($sectionNames as $sectionId => $sectionName) {
                $row[] = isset($tableData[$itemId][$sectionId]) ? $tableData[$itemId][$sectionId] : '';
            }
            $row[] = $itemTotals[$itemId] ?? 0; // Add the total column
            fputcsv($output, $row);
        }
    
        // Close the file pointer
        fclose($output);

        // Get emailing list
        $mailingList = $this->monthlyModel->getEmails();

        // Call the mailer to send the report
        $this->mailer->sendCSVReportByEmail($filePath, $mailingList);
    
        exit;
    }

    // Manual spreadsheet created for the monthly report
    public function generateCSVReport2(): Response
    {    
        // Fetch data for the previous month (same as before)
        $orders = $this->orderModel->monthlyReportPreviousMonth();
        
        // Prepare data for the CSV report (same structure as before)
        $tableData = [];
        $sectionNames = [];
        $itemNames = [];
        $itemTotals = [];
        
        foreach ($orders as $order) {
            $itemNames[$order['item_id']] = $order['item_name'];
            $sectionNames[$order['section_id']] = $order['section_name'];
            $tableData[$order['item_id']][$order['section_id']] = $order['total_quantity'];
        
            if (!isset($itemTotals[$order['item_id']])) {
                $itemTotals[$order['item_id']] = 0;
            }
            $itemTotals[$order['item_id']] += $order['total_quantity'];
        }
        
        // Define file path for saving the CSV temporarily
        $filePath = sys_get_temp_dir() . '/monthly_report.csv';
        
        // Open a file pointer for writing the CSV to disk
        $output = fopen($filePath, 'w');
        
        // Set the header row
        $headers = ['Item Name'];
        foreach ($sectionNames as $sectionName) {
            $headers[] = $sectionName;
        }
        $headers[] = 'Total'; // Add "Total" column
    
        // Write the header row to the CSV
        fputcsv($output, $headers);
    
        // Fill in the data rows
        foreach ($itemNames as $itemId => $itemName) {
            $row = [$itemName];
            foreach ($sectionNames as $sectionId => $sectionName) {
                $row[] = isset($tableData[$itemId][$sectionId]) ? $tableData[$itemId][$sectionId] : '';
            }
            $row[] = $itemTotals[$itemId] ?? 0; // Add the total column
            fputcsv($output, $row);
        }
        
        // Close the file pointer
        fclose($output);

        // Get emailing list
        $mailingList = $this->monthlyModel->getEmails();

        // Check the result of the email sending process
        $success = $this->mailer->sendCSVReportByEmail($filePath, $mailingList);

        if ($success === true) {
            $_SESSION['success_message'] = 'Monthly report successfully sent!';
        } else {
            $_SESSION['error_message'] = 'Failed to send the monthly report. Verify that the emails are correct!';
        }

        // Redirect after setting the message
        return $this->redirect('/warehouse/managers/history/monthly');
    }

    // Manual spreadsheet created for the monthly report
    public function printCurrentMonthlyReport(): Response
    {
        // Fetch data for the previous month
        $orders = $this->orderModel->monthlyReportPreviousMonth();
        
        // Prepare data for the CSV report
        $tableData = [];
        $sectionNames = [];
        $itemNames = [];
        $itemTotals = [];
        
        foreach ($orders as $order) {
            $itemNames[$order['item_id']] = $order['item_name'];
            $sectionNames[$order['section_id']] = $order['section_name'];
            $tableData[$order['item_id']][$order['section_id']] = $order['total_quantity'];
        
            if (!isset($itemTotals[$order['item_id']])) {
                $itemTotals[$order['item_id']] = 0;
            }
            $itemTotals[$order['item_id']] += $order['total_quantity'];
        }
        
        // Set the file name for download
        $fileName = 'monthly_report_' . date('Y-m-d') . '.csv';
        
        // Set the headers to force download the CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        // Open output stream for writing CSV directly to the browser
        $output = fopen('php://output', 'w');
        
        // Set the header row
        $headers = ['Item Name'];
        foreach ($sectionNames as $sectionName) {
            $headers[] = $sectionName;
        }
        $headers[] = 'Total'; // Add "Total" column
    
        // Write the header row to the CSV
        fputcsv($output, $headers);
    
        // Fill in the data rows
        foreach ($itemNames as $itemId => $itemName) {
            $row = [$itemName];
            foreach ($sectionNames as $sectionId => $sectionName) {
                $row[] = isset($tableData[$itemId][$sectionId]) ? $tableData[$itemId][$sectionId] : '';
            }
            $row[] = $itemTotals[$itemId] ?? 0; // Add the total column
            fputcsv($output, $row);
        }
        
        // Close the output stream
        fclose($output);
    
        // Terminate the script to prevent further output
        exit;
    }

    public function denied(): Response
    {
        $orders = $this->orderModel->deniedReport();
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Denied", "heading" => "Denied Requests"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/denied_requests.php", ["orders" => $orders]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    public function deniedOne(string $id): Response
    {
        $order = $this->orderModel->denyOne($id);
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Denied", "heading" => "Denied Requests"]));
    
        // Render the new admin form
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/denied_one.php", ["order" => $order]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
    }

    /*********************************************************************************************************************************** */
    // In House Request

    public function sectionOrder(): Response
    {
        $supervisors = $this->userModel->getSupervisorsAndManagers();
        $sections = $this->userModel->getSections();

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Section Select",
                                                                               "heading" => "Select Your Section"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/InHouse/section.php", ["supervisors" => $supervisors, "sections" => $sections]));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function createOrder(): Response
    {
        // Extract search parameters from GET or POST
        $search = $this->request->post['search'] ?? $this->request->get['search'] ?? '';
        $itemType = $this->request->post['item_type'] ?? $this->request->get['item_type'] ?? '';
        $sort = $this->request->post['sort'] ?? $this->request->get['sort'] ?? 'name';
        $order = $this->request->post['order'] ?? $this->request->get['order'] ?? 'asc';
        $itemTypes = $this->itemModel->getItemTypesforManagers();

        if ($search || $itemType) {
            // Perform search query
            $items = $this->itemModel->searchItemsForManagers($search, $itemType, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $items = $this->itemModel->getAllItemsForManagers($sort, $order);
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
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Create Request",
                                                                                "heading" => "Create Request"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/InHouse/create.php", ["items" => $items,
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

    public function verifyOrder(): Response
    {    
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];
        $supervisor = $_SESSION['selected_supervisor'];

        // var_dump($_SESSION); die;

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Verify Request",
                                                                                "heading" => "Verify Your Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/InHouse/verify.php", ["supervisor" => $supervisor, 'section' => $section, 'items' => $items]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function updateItems(): Response
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get current session items
            $items = $_SESSION['selected_items'] ?? [];
    
            // Loop through the posted items and handle updates/removals
            if (isset($_POST['items'])) {
                foreach ($_POST['items'] as $item_id => $item_data) {
                    if ($_POST['action'] === 'update') {
                        // Update the quantity if greater than 0, otherwise remove
                        $new_quantity = (int)$item_data['quantity'];
                        if ($new_quantity > 0) {
                            // Update the item's quantity
                            $items[$item_id]['quantity'] = $new_quantity;
                        } else {
                            // Remove item if quantity is 0
                            unset($items[$item_id]);
                        }
                    } elseif ($_POST['action'] === 'remove') {
                        // Remove the item completely
                        unset($items[$item_id]);
                    }
                }
            }
    
            // Update the session with the modified items
            $_SESSION['selected_items'] = $items;
    
            // Redirect back to the verification page
            header('Location: /warehouse/managers/inhouse/verify');
            exit;
        }
    
        return $this->response;
    }    

    public function submitOrder(): Response
    {
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];
        $supervisor = $_SESSION['selected_supervisor'];
    
        try {
            $this->orderModel->submitWarehouseOrder();
    
            // Remove items from cart
            unset($_SESSION['selected_items'], $_SESSION['selected_session']);
    
            return $this->redirect('/warehouse/dashboard');
    
        } catch (Exception $e) {
            $this->response->setBody('Failed to submit order: ' . $e->getMessage());
            return $this->response;
        }
    }
}