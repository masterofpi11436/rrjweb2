<?php

require_once 'fpdf/fpdf.php'; // Include FPDF
require_once 'vendor/autoload.php'; // Include Composer autoload for FPDI

use setasign\Fpdi\Fpdi;

$notProcessedFolder = 'Not Processed/';
$processedFolder = 'Processed/';

if (!is_dir($processedFolder)) {
    mkdir($processedFolder, 0777, true);
}

// Get all PDF files from the 'Not Processed' folder
$pdfFiles = glob($notProcessedFolder . '*.pdf');

foreach ($pdfFiles as $pdfFile) {
    $pdf = new Fpdi();
    $pageCount = $pdf->setSourceFile($pdfFile); // Set source file for the current PDF

    for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
        // Create a new FPDI object for each page
        $newPdf = new Fpdi();
        $newPdf->AddPage();

        // Set the source file for each new PDF and import the specific page
        $newPdf->setSourceFile($pdfFile);  // Set the source file again for each new instance
        $templateId = $newPdf->importPage($pageNo);
        $newPdf->useTemplate($templateId);

        // Save the new PDF to the 'Processed' folder
        $baseName = pathinfo($pdfFile, PATHINFO_FILENAME);
        $newPdfFileName = $processedFolder . $baseName . '_page_' . $pageNo . '.pdf';
        $newPdf->Output($newPdfFileName, 'F');
    }
}

echo "PDFs processed successfully.";
