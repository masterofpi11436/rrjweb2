<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
// $router->add("/", ["controller" => "home", "action" => "homepage"]);

// Admin Pages
$router->add("/tablets/all", ["controller" => "tablets", "action" => "viewall"]);
$router->add("/tablets/add", ["controller" => "tablets", "action" => "addNewTablet"]);
$router->add("/tablets/create", ["controller" => "tablets", "action" => "create", "method" => "post"]);
$router->add("/tablets/one/{id:\d+}", ["controller" => "tablets", "action" => "viewone"]);
$router->add("/tablets/edit/{id:\d+}", ["controller" => "tablets", "action" => "editTablet"]);
$router->add("/tablets/update/{id:\d+}", ["controller" => "tablets", "action" => "updateTablet", "method" => "post"]);
$router->add("/tablets/delete/{id:\d+}", ["controller" => "tablets", "action" => "deleteTablet"]);
$router->add("/tablets/destroy/{id:\d+}", ["controller" => "tablets", "action" => "destroyTablet", "method" => "post"]);

// Report Views
$router->add("/tablets/reportall", ["controller" => "tablets", "action" => "reportAll"]);

// Blanket Route
// $router->add("/{controller}/{action}");
// $router->add("/{controller}/{action}/{id:\d+}");


return $router;