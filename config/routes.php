<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
// $router->add("/", ["controller" => "home", "action" => "homepage"]);

// Log in
$router->add("/login", ["controller" => "users", "action" => "login"]);
$router->add("/login/auth", ["controller" => "users", "action" => "auth", "method" => "post"]);

// Admin Pages (Main)
$router->add("/admins/dashboard", ["controller" => "admins", "action" => "dashboard", "middleware" => "auth"]);
$router->add("/admins/all", ["controller" => "admins", "action" => "viewall", "middleware" => "auth"]);
$router->add("/admins/add", ["controller" => "admins", "action" => "addNewUser", "middleware" => "auth"]);
$router->add("/admins/create", ["controller" => "admins", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/admins/one/{id:\d+}", ["controller" => "admins", "action" => "viewone", "middleware" => "auth"]);
$router->add("/admins/edit/{id:\d+}", ["controller" => "admins", "action" => "editUser", "middleware" => "auth"]);
$router->add("/admins/update/{id:\d+}", ["controller" => "admins", "action" => "updateUser", "method" => "post", "middleware" => "auth"]);
$router->add("/admins/delete/{id:\d+}", ["controller" => "admins", "action" => "deleteUser", "middleware" => "auth"]);
$router->add("/admins/destroy/{id:\d+}", ["controller" => "admins", "action" => "destroyUser", "method" => "post", "middleware" => "auth"]);

// Admin Pages (Tablet)
$router->add("/tablets/all", ["controller" => "tablets", "action" => "viewall", "middleware" => "auth"]);
$router->add("/tablets/add", ["controller" => "tablets", "action" => "addNewTablet", "middleware" => "auth"]);
$router->add("/tablets/create", ["controller" => "tablets", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/tablets/one/{id:\d+}", ["controller" => "tablets", "action" => "viewone", "middleware" => "auth"]);
$router->add("/tablets/edit/{id:\d+}", ["controller" => "tablets", "action" => "editTablet", "middleware" => "auth"]);
$router->add("/tablets/update/{id:\d+}", ["controller" => "tablets", "action" => "updateTablet", "method" => "post", "middleware" => "auth"]);
$router->add("/tablets/delete/{id:\d+}", ["controller" => "tablets", "action" => "deleteTablet", "middleware" => "auth"]);
$router->add("/tablets/destroy/{id:\d+}", ["controller" => "tablets", "action" => "destroyTablet", "method" => "post", "middleware" => "auth"]);

// Report Views (Tablets)
$router->add("/tablets/reportall", ["controller" => "tablets", "action" => "reportAll"]);

// Admin Pages (Phone Listings)
$router->add("/phones/all", ["controller" => "phones", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/phones/add", ["controller" => "phones", "action" => "addNewPhone", "middleware" => "auth"]);
$router->add("/phones/create", ["controller" => "phones", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/phones/one/{id:\d+}", ["controller" => "phones", "action" => "viewone", "middleware" => "auth"]);
$router->add("/phones/edit/{id:\d+}", ["controller" => "phones", "action" => "editPhone", "middleware" => "auth"]);
$router->add("/phones/update/{id:\d+}", ["controller" => "phones", "action" => "updatePhone", "method" => "post", "middleware" => "auth"]);
$router->add("/phones/delete/{id:\d+}", ["controller" => "phones", "action" => "deletePhone", "middleware" => "auth"]);
$router->add("/phones/destroy/{id:\d+}", ["controller" => "phones", "action" => "destroyPhone", "method" => "post", "middleware" => "auth"]);

// Report Views (Phone Listings)
$router->add("/phones/reportall", ["controller" => "phones", "action" => "reportAll"]);

// Blanket Route
// $router->add("/{controller}/{action}");
// $router->add("/{controller}/{action}/{id:\d+}");

return $router;