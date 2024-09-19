<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

use setasign\Fpdi\Fpdi;
use ZipArchive;

class Medicals extends Controller
{
    public function index()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Upload PDF", "heading" => "Upload PDF"]));

        // Render the all phones view
        $this->response->appendBody($this->viewer->render("Medical/index.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}