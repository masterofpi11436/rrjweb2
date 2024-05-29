<?php

// Enforce strict type checking
declare(strict_types=1);

namespace Framework;

class Dotenv
{
    /**
     * Load the .env file and set the environment variables
     * 
     * @param string $path The path to the .env file
     */
    public function load(string $path): void
    {
        // Read the file into an array of lines, ignoring newline characters
        $lines = file($path, FILE_IGNORE_NEW_LINES);

        // Iterate over each line in the .env file
        foreach ($lines as $line) {

            // Split each line into a name and value pair at the first '=' character
            list($name, $value) = explode("=", $line, 2);

            // Set the environment variable
            $_ENV[$name] = $value;
        }
    }
}