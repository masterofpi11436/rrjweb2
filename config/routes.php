<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
// $router->add("/", ["controller" => "home", "action" => "homepage"]);

// Log in
$router->add("/login", ["controller" => "users", "action" => "login"]);
$router->add("/login/auth", ["controller" => "users", "action" => "auth", "method" => "post"]);

// Admin Pages
$router->add("/tablets/all", ["controller" => "tablets", "action" => "viewall", "middleware" => "auth"]);
$router->add("/tablets/add", ["controller" => "tablets", "action" => "addNewTablet", "middleware" => "auth"]);
$router->add("/tablets/create", ["controller" => "tablets", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/tablets/one/{id:\d+}", ["controller" => "tablets", "action" => "viewone", "middleware" => "auth"]);
$router->add("/tablets/edit/{id:\d+}", ["controller" => "tablets", "action" => "editTablet", "middleware" => "auth"]);
$router->add("/tablets/update/{id:\d+}", ["controller" => "tablets", "action" => "updateTablet", "method" => "post", "middleware" => "auth"]);
$router->add("/tablets/delete/{id:\d+}", ["controller" => "tablets", "action" => "deleteTablet", "middleware" => "auth"]);
$router->add("/tablets/destroy/{id:\d+}", ["controller" => "tablets", "action" => "destroyTablet", "method" => "post", "middleware" => "auth"]);

// Report Views
$router->add("/tablets/reportall", ["controller" => "tablets", "action" => "reportAll"]);

// Blanket Route
// $router->add("/{controller}/{action}");
// $router->add("/{controller}/{action}/{id:\d+}");


return $router;