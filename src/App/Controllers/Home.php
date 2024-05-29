<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use Framework\Viewer;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for the home page.
 */
class Home extends Controller
{
    /**
     * Renders the home page.
     */
    public function homePage(): Response
    {
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Home Page", "heading" => "Home Page"]));

        $this->response->appendBody($this->viewer->render("Home/home_page.php"));

        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}