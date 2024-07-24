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
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Supervisor Dashboard",
                                                                                "heading" => "Supervisor Dashboard"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/dashboard.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function section(): Response
    {
        $sections = $this->userModel->getSections();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Section Select",
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
            $quantity = $this->request->post['quantity'];
    
            $item = $this->itemModel->getItemById($itemId);
            $item['quantity'] = $quantity;
            $selectedItems[$itemId] = $item;
    
            // Update the session with the selected items
            $_SESSION['selected_items'] = $selectedItems;
        }
    
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "WSR",
                                                                                "heading" => "WSR Supplies"]));
    
        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/supervisors/form.php", [
            "items" => $items,
            "itemTypes" => $itemTypes,
            "selectedItems" => $selectedItems,
            "search" => $search,
            "itemType" => $itemType,
            "sort" => $sort,
            "order" => $order
        ]));
    
        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }

    public function verify(): Response
    {
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Verify Request",
                                                                                "heading" => "Verify Your Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/verify.php", ['section' => $section, 'items' => $items]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function submit(): Response
    {
        try {
            $this->orderModel->submitSupervisorOrder();
            
            // Send Email to warehouse manager
            // $this->mailer->sendNewRequestToWarehouse();
            
            return $this->redirect('/warehouse/supervisors/success');

        } catch (Exception $e) {
            $this->response->setBody('Failed to submit order: ' . $e->getMessage());
            return $this->response;
        }
    }

    public function success(): Response
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Next Steps",
                                                                                "heading" => "Next Steps"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/success.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function approveDeny(): Response
    {
        $sections = $this->model->getSections();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "View Requests",
                                                                               "heading" => "Approve or Deny Requests"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/approve_deny.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}