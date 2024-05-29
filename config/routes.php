<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
$router->add("/", ["controller" => "home", "action" => "homepage", "middleware" => "deny|message|message"]);

$router->add("/product/add/{id:\d+}", ["controller" => "products", "action" => "addNewProduct"]);
$router->add("/product/edit/{id:\d+}", ["controller" => "products", "action" => "editProduct"]);
$router->add("/product/delete/{id:\d+}", ["controller" => "products", "action" => "deleteProduct", "middleware" => "message"]);
$router->add("/product/destroy/{id:\d+}", ["controller" => "products", "action" => "destroyProduct", "method" => "post"]);

// Blanket Route
$router->add("/{controller}/{action}", ["middleware" => "message|message"]);
$router->add("/{controller}/{action}/{id:\d+}");


return $router;