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
class Users extends Controller
{
    public function __construct(private User $userModel, private Item $itemModel, private Order $orderModel, private Mail $mailer){}

    // Supervisor name section seelction
    public function info(): Response
    {
        $supervisors = $this->userModel->getSupervisors();
        $sections = $this->userModel->getSections();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Section Supervisor and Section",
                                                                                "heading" => "Section Supervisor and Section"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/section.php", ["supervisors" => $supervisors, "sections" => $sections]));

        // Render the footer
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

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "WSR",
                                                                                "heading" => "Request Supplies"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/users/form.php", ["items" => $items,
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

    // Ask the user to verify the cart to submit to the supervisor
    public function verify(): Response
    {
        $supervisor = $_SESSION['selected_supervisor'];
        $section = $_SESSION['selected_section'];
        $items = $_SESSION['selected_items'] ?? [];

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Verify Request",
                                                                                "heading" => "Submit Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/verify.php", ['supervisor' => $supervisor,
                                                                                         'section' => $section,
                                                                                         'items' => $items]));

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
        header('Location: /warehouse/users/verify');
        exit;
    }

    public function submit(): Response
    {
        try {
            $this->orderModel->submitUserOrder();

            $email = $_SESSION['selected_supervisor']['email'];

            // Send Email to warehouse manager
            $this->mailer->sendNewRequestToSupervisor($email);

            return $this->redirect('/warehouse/users/success');

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
        $this->response->appendBody($this->viewer->render("Warehouse/Users/success.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}