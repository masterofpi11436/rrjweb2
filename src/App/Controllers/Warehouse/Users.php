<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

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
    public function __construct(private Item $model){}

    // Supervisor name section seelction
    public function info()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Submission Information",
                                                                                "heading" => "Submission Information"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Users/section.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}