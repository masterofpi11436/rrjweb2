<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
// $router->add("/", ["controller" => "home", "action" => "homepage"]);

// Log in
$router->add("/login", ["controller" => "users", "action" => "login"]);
$router->add("/login/auth", ["controller" => "users", "action" => "auth", "method" => "post"]);
$router->add('/logout', ["controller" => "users", "action" => "logout"]);

// *************************************************************************************************************************************************//

// Search for names on the Restricted tablet list and the OPR list
$router->add("/names/all", ["controller" => "names", "action" => "viewall", "middleware" => "auth"]);
$router->add("/names/viewall", ["controller" => "names", "action" => "viewall", "middleware" => "auth"]);

// *************************************************************************************************************************************************//

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

// *************************************************************************************************************************************************//

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

// *************************************************************************************************************************************************//

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

// *************************************************************************************************************************************************//
// Admin Pages (Mailroom Listings)
$router->add("/mailrooms/all", ["controller" => "mailrooms", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/mailrooms/add", ["controller" => "mailrooms", "action" => "addNewName", "middleware" => "auth"]);
$router->add("/mailrooms/create", ["controller" => "mailrooms", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/mailrooms/one/{id:\d+}", ["controller" => "mailrooms", "action" => "viewone", "middleware" => "auth"]);
$router->add("/mailrooms/edit/{id:\d+}", ["controller" => "mailrooms", "action" => "editName", "middleware" => "auth"]);
$router->add("/mailrooms/update/{id:\d+}", ["controller" => "mailrooms", "action" => "updateName", "method" => "post", "middleware" => "auth"]);
$router->add("/mailrooms/delete/{id:\d+}", ["controller" => "mailrooms", "action" => "deleteName", "middleware" => "auth"]);
$router->add("/mailrooms/destroy/{id:\d+}", ["controller" => "mailrooms", "action" => "destroyName", "method" => "post", "middleware" => "auth"]);

// Report Views (Mailroom Listings)
$router->add("/mailrooms/reportall", ["controller" => "mailrooms", "action" => "reportAll"]);

// *************************************************************************************************************************************************//

// Admin Pages (Cell Listings)
$router->add("/cells/all", ["controller" => "cells", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/cells/add", ["controller" => "cells", "action" => "addNewCell", "middleware" => "auth"]);
$router->add("/cells/create", ["controller" => "cells", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/cells/one/{id:\d+}", ["controller" => "cells", "action" => "viewone", "middleware" => "auth"]);
$router->add("/cells/edit/{id:\d+}", ["controller" => "cells", "action" => "editCell", "middleware" => "auth"]);
$router->add("/cells/update/{id:\d+}", ["controller" => "cells", "action" => "updateCell", "method" => "post", "middleware" => "auth"]);
$router->add("/cells/delete/{id:\d+}", ["controller" => "cells", "action" => "deleteCell", "middleware" => "auth"]);
$router->add("/cells/destroy/{id:\d+}", ["controller" => "cells", "action" => "destroyCell", "method" => "post", "middleware" => "auth"]);

// Report Views (Cell Listings)
$router->add("/cells/reportall", ["controller" => "cells", "action" => "reportAll"]);

// *************************************************************************************************************************************************//

// Admin Pages (Contractor Listings)
$router->add("/contractors/all", ["controller" => "contractors", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/contractors/add", ["controller" => "contractors", "action" => "addNewCell", "middleware" => "auth"]);
$router->add("/contractors/create", ["controller" => "contractors", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/contractors/one/{id:\d+}", ["controller" => "contractors", "action" => "viewone", "middleware" => "auth"]);
$router->add("/contractors/edit/{id:\d+}", ["controller" => "contractors", "action" => "editCell", "middleware" => "auth"]);
$router->add("/contractors/update/{id:\d+}", ["controller" => "contractors", "action" => "updateCell", "method" => "post", "middleware" => "auth"]);
$router->add("/contractors/delete/{id:\d+}", ["controller" => "contractors", "action" => "deleteCell", "middleware" => "auth"]);
$router->add("/contractors/destroy/{id:\d+}", ["controller" => "contractors", "action" => "destroyCell", "method" => "post", "middleware" => "auth"]);

// *************************************************************************************************************************************************//

// Admin Pages (Contractor Listings)
$router->add("/volunteers/all", ["controller" => "volunteers", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/volunteers/add", ["controller" => "volunteers", "action" => "addNewCell", "middleware" => "auth"]);
$router->add("/volunteers/create", ["controller" => "volunteers", "action" => "create", "method" => "post", "middleware" => "auth"]);
$router->add("/volunteers/one/{id:\d+}", ["controller" => "volunteers", "action" => "viewone", "middleware" => "auth"]);
$router->add("/volunteers/edit/{id:\d+}", ["controller" => "volunteers", "action" => "editCell", "middleware" => "auth"]);
$router->add("/volunteers/update/{id:\d+}", ["controller" => "volunteers", "action" => "updateCell", "method" => "post", "middleware" => "auth"]);
$router->add("/volunteers/delete/{id:\d+}", ["controller" => "volunteers", "action" => "deleteCell", "middleware" => "auth"]);
$router->add("/volunteers/destroy/{id:\d+}", ["controller" => "volunteers", "action" => "destroyCell", "method" => "post", "middleware" => "auth"]);

// Blanket Route
// $router->add("/{controller}/{action}");
// $router->add("/{controller}/{action}/{id:\d+}");

return $router;