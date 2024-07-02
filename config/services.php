<?php

// Create a Container object to manage dependencies
$container = new Framework\Container;

// Register the Database object in the container by binding it to the service container class
$container->set(App\Database::class, function() {

    return new App\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"],);
});

// Register Mailer
$container->set(\Framework\Mailer::class, function() use ($container) {
    return new \Framework\Mailer($container->get(\PHPMailer\PHPMailer\PHPMailer::class));
});

return $container;