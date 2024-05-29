<?php

// Enforce type checking
declare(strict_types=1);

namespace Framework;

use ErrorException;
use Throwable;
use Framework\Exceptions\PageNotFoundException;

class ErrorHandler
{
    /**
     * Handle PHP errors and convert them to ErrorException.
     *
     * @param int $errno The level of the error raised.
     * @param string $errstr The error message.
     * @param string $errfile The filename where the error was raised.
     * @param int $errline The line number where the error was raised.
     * @return bool Always returns false to indicate that the PHP internal error handler should not handle the error.
     * @throws ErrorException Throws an ErrorException to be handled by the exception handler.
     */
    public static function handleError(int $errno, string $errstr, string $errfile, int $errline): bool
    {
        // Convert PHP errors into ErrorException, which can be caught by exception handling
        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    /**
     * Handle uncaught exceptions.
     *
     * @param Throwable $exception The exception that was thrown.
     * @return void
     * @throws Throwable Rethrows the exception for further handling or logging.
     */
    public static function handleException(Throwable $exception): void
    {

        // Check if the exception is a PageNotFoundException
        if ($exception instanceof PageNotFoundException) {
    
            // Send a 404 HTTP response code
            http_response_code(404);
    
            // Set the custom error page for 404 errors
            $template = "404.php";
    
        } else{
    
            // Send a 500 HTTP response code for server-side errors
            http_response_code(500);
    
            // Set the custom error page for 500 errors
            $template = "500.php";
        }
    
        // Check if detailed error messages should be shown (development mode)
        if ($_ENV["SHOW_ERRORS"]) {
    
            // Enable display of error messages
            ini_set("display_errors", "1");
    
        } else {
    
            // Disable display of error messages (production mode)
            ini_set("display_errors", "0");
    
            // Enable logging of errors
            ini_set("log_errors", "1");
    
            // Uncomment to check the error log location
            // echo ini_get("error_log"); // Location: C:\xampp\php\logs\php_error_log
    
            // Display the custom error page to the user
            require dirname(__DIR__, 2) . "/views/Errors/$template";
    
        }
    
        // Rethrow the exception to allow for further handling or logging
        throw $exception;
    }

}