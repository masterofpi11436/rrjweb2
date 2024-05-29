<?php

return [
    "message" => \App\Middleware\ChangeResponseExample::class,
    "trim" => \App\Middleware\ChangeRequestExample::class,
    "deny" => \App\Middleware\RedirectExample::class
];

// "message" appends a message
// "trim" trims the leading and trailing spaces for the post
// "deny" redirects the user to a specified URL