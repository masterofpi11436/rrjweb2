<?php

declare(strict_types=1);

namespace Framework;

class Request
{
    // Constructor to initialize request properties
    public function __construct(public string $uri,
                                public string $method,
                                public array $get,
                                public array $post,
                                public array $files,
                                public array $cookie,
                                public array $server){}
    
    // Static method to create a Request instance from global variables
    public static function createGlobalVariables()
    {
        return new static($_SERVER["REQUEST_URI"],
                          $_SERVER["REQUEST_METHOD"],
                          $_GET,
                          $_POST,
                          $_FILES,
                          $_COOKIE,
                          $_SERVER);
    }
}