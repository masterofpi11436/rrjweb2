<?php

// Enforce type checking
declare(strict_types=1);

namespace Framework;

class Viewer
{
    // Render the views and pass in any varibles
    public function render(string $page, array $data = []): string
    {
        // Convert the data array into individual variables
        extract($data, EXTR_SKIP);

        // Start the output buffering to process the view (if any)
        ob_start();

        // Require the view file. (Captured in the buffer)
        require dirname(__DIR__, 2) . "/views/$page";

        // Return the contents of the buffer and clean the buffer
        return ob_get_clean();
    }
}