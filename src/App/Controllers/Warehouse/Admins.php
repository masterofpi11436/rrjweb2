<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Admin;
use App\Models\Warehouse\Order;
use App\Models\Warehouse\Item;
use App\Models\Warehouse\Section;
use App\Models\Warehouse\Mail;
use App\Models\Warehouse\User;
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
    public function __construct(private Admin $model, private Order $orderModel, private Item $itemModel, private Section $sectionModel, private Mail $mailer, private User $userModel){}

    public function dashboard(): Response
    {
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
            // $this->mailer->sendApproved($requestorEmail);
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
    
        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Order", "heading" => "Edit Order"]));
    
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
    
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Monthly", "heading" => "Section Items (30 Days)"]));
    
        // Render the view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/Histories/monthly.php", [
            "tableData" => $tableData,
            "sectionNames" => $sectionNames,
            "itemNames" => $itemNames,
            "itemTotals" => $itemTotals,  // Pass the item totals to the view
            "sections" => $sections,
            "section_id" => $sectionId,
            "months" => $months,
            "selected_month" => $selectedMonth,
            "selected_section_name" => $selectedSectionName
        ]));
    
        $this->response->appendBody($this->viewer->render("shared/footer.php"));
    
        return $this->response;
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
        $sections = $this->userModel->getSections();

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Section Select",
                                                                               "heading" => "Select Your Section"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Admins/InHouse/section.php", ["sections" => $sections]));

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

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Verify Request",
                                                                                "heading" => "Verify Your Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Admins/InHouse/verify.php", ['section' => $section, 'items' => $items]));

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
        header('Location: /warehouse/managers/inhouse/verify');
        exit;
    }

    public function submitOrder(): Response
    {
        // Confirmation email information
        $items = $_SESSION['selected_items'] ?? [];
    
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