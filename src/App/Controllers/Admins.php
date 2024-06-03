<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Security\User;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling phone-related actions.
 */
class Admins extends Controller
{
    public function __construct(private User $model)
    {

    }

    public function dashboard(): Response
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "Admin Dashboard"]));

        // Render the all phones view
        $this->response->appendBody($this->viewer->render("Admins/dashboard.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}