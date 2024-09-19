<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

// Remove the manual require statements and use Composer's autoloader

use setasign\Fpdi\Tcpdf\Fpdi;

class Medicals extends Controller
{
    public function index(): Response
    {
        $not_processed_dir = 'not_processed/';
        $uploaded_files = [];
        if (is_dir($not_processed_dir)) {
            $uploaded_files = array_diff(scandir($not_processed_dir), ['.', '..']);
        }

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Upload PDF", "heading" => "Upload PDF"]));
        $this->response->appendBody($this->viewer->render("Medical/index.php", ["uploaded_files" => $uploaded_files]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function uploadPDF(): Response
    {
        if (isset($_FILES['pdfFile'])) {
            $file = $_FILES['pdfFile'];

            if ($file['error'] === UPLOAD_ERR_OK) {
                $not_processed_dir = 'not_processed/';
                $file_name = basename($file['name']);
                $target_path = $not_processed_dir . $file_name;

                if (!is_dir($not_processed_dir)) {
                    mkdir($not_processed_dir, 0777, true);
                }

                if (move_uploaded_file($file['tmp_name'], $target_path)) {
                    return $this->redirect('/medical/main');
                } else {
                    echo "Failed to move the uploaded file.";
                }
            } else {
                echo "File upload error. Please try again.";
            }
        }
    }

    public function processPDF(): Response
    {
        if (isset($_POST['pdf_file'])) {
            $pdf_file = $_POST['pdf_file'];
            $not_processed_dir = 'not_processed/';
            $processed_dir = 'processed/';
            $pdf_path = $not_processed_dir . $pdf_file;

            if (!is_dir($processed_dir)) {
                mkdir($processed_dir, 0777, true);
            }

            if (file_exists($pdf_path)) {
                echo "Processing PDF file: " . $pdf_path;
                try {
                    $pdf = new Fpdi();
                    $page_count = $pdf->setSourceFile($pdf_path); // Get the total number of pages
                    echo "Found $page_count pages in the PDF";
                } catch (Exception $e) {
                    echo "Error processing PDF: " . $e->getMessage();
                }
            } else {
                echo "PDF file not found at: " . $pdf_path;
            }
        }

        return $this->response;
    }

    public function downloadPDF()
    {
        // Add your download PDF logic here if necessary
    }
}
