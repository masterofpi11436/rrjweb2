<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\User;
use App\Models\Warehouse\Item;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling warehouse user-related actions.
 */
class Users extends Controller
{
    public function __construct(private User $userModel, private Item $itemModel){}

    // Supervisor name section seelction
    public function info(): Response
    {
        $supervisors = $this->userModel->getSupervisors();
        $sections = $this->userModel->getSections();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Submission Information",
                                                                                "heading" => "Submission Information"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/section.php", ["supervisors" => $supervisors, "sections" => $sections]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function items(): Response
    {
        $items = $this->itemModel->getAllItems();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "WSR",
                                                                                "heading" => "WSR Supplies"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/items.php", ["items" => $items]));

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
                                                                                "heading" => "Verify Your Request"]));

        // Render the verification view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/verify.php", ['supervisor' => $supervisor,
                                                                                         'section' => $section,
                                                                                         'items' => $items]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}