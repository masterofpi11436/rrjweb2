<?php

// Enforce type checking
declare(strict_types=1);

// Front controller

define("ROOT_PATH", dirname(__DIR__));

// Autoload the required classes
spl_autoload_register(function($class) {

    // Require the path of the class location and replace the \ with / to work for windows
    require ROOT_PATH . "/src/" . str_replace("\\", "/", $class) . ".php";

});

// Create a Dotenv object to handle environment variables
$dotenv = new Framework\Dotenv;

// Load the .env file and populate the $_ENV superglobal with its values
$dotenv->load(ROOT_PATH . '/.env');

// Set the custom error handler
set_error_handler("Framework\ErrorHandler::handleError");

// Set the custom exception handler
set_exception_handler("Framework\ErrorHandler::handleException");

// Load the routing table configuration and return a Router object
$router = require ROOT_PATH . '/config/routes.php';

// Load the service container configuration and return a Container object
$container = require ROOT_PATH . '/config/services.php';

// Load the middleware configuration and return a middleware object
$middleware = require ROOT_PATH . '/config/middleware.php';

// Create a Dispatcher object to handle route dispatching
$dispatcher = new Framework\Dispatcher($router, $container, $middleware);

// Create a Request object from global variables
$request = Framework\Request::createGlobalVariables();

// Dispatch the request to the appropriate controller and action
$response = $dispatcher->handle($request);

// Send the response
$response->send();