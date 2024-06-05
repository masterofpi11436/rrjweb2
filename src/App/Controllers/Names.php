<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Name;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling name-related actions.
 */
class Names extends Controller
{
    /**
     * Constructor.
     *
     * @param Name $model The name model
     */
    public function __construct(private Name $model){}

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';

        if ($search) {
            // Perform search query
            $names = $this->model->searchNames($search);
        } else {
            // Retrieve all records if no search query
            $names = $this->model->getAll();
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Inmates", "heading" => "All Inmates"]));

        // Render the all names view
        $this->response->appendBody($this->viewer->render("Names/all_names.php", ["names" => $names]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}