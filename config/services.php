<?php

// Create a Container object to manage dependencies
$container = new Framework\Container;

// Register the Database object in the container by binding it to the service container class
$container->set(App\Database::class, function() {

    return new App\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"],);
});

return $container;