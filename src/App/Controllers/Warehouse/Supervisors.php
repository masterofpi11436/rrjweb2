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
class Supervisors extends Controller
{
    public function __construct(private User $model){}

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
        $sections = $this->model->getSections();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Section Select",
                                                                               "heading" => "Select Your Section"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/section.php", ["sections" => $sections]));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function approveDeny(): Response
    {
        $sections = $this->model->getSections();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "View Requests",
                                                                               "heading" => "Approve or Deny Requests"]));

        $this->response->appendBody($this->viewer->render("Warehouse/Supervisors/approve_deny.php", ["sections" => $sections]));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}