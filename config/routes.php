<?php

// Create a Router object to route paths to the controllers
$router = new Framework\Router;

// Routing table
// $router->add("/", ["controller" => "home", "action" => "homepage"]);

// Login authentication and reset pages
$router->add("/login", ["controller" => "users", "action" => "login"]);
$router->add("/login/auth", ["controller" => "users", "action" => "auth", "method" => "post"]);

// Reset Pages
$router->add('/forgot', ["controller" => "users", "action" => "forgotPassword"]);
$router->add('/verify', ["controller" => "users", "action" => "verifyUser"]);
$router->add('/success', ["controller" => "users", "action" => "success"]);

// New Password Pages
$router->add('/reset_password', ["controller" => "users", "action" => "resetPassword"]);
$router->add('/process_password', ["controller" => "users", "action" => "createNewPassword"]);

// Log Out
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
$router->add("/admins/create", ["controller" => "admins", "action" => "create", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/admins/one/{id:\d+}", ["controller" => "admins", "action" => "viewone", "middleware" => "auth"]);
$router->add("/admins/edit/{id:\d+}", ["controller" => "admins", "action" => "editUser", "middleware" => "auth"]);
$router->add("/admins/update/{id:\d+}", ["controller" => "admins", "action" => "updateUser", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/admins/delete/{id:\d+}", ["controller" => "admins", "action" => "deleteUser", "middleware" => "auth"]);
$router->add("/admins/destroy/{id:\d+}", ["controller" => "admins", "action" => "destroyUser", "method" => "post", "middleware" => "auth"]);

// Swtich application
$router->add("/admins/switchRole", ["controller" => "users", "action" => "switchRole"]);


// *************************************************************************************************************************************************//

// Admin Pages (Tablet)
$router->add("/tablets/all", ["controller" => "tablets", "action" => "viewall", "middleware" => "auth"]);
$router->add("/tablets/add", ["controller" => "tablets", "action" => "addNewTablet", "middleware" => "auth"]);
$router->add("/tablets/create", ["controller" => "tablets", "action" => "create", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/tablets/one/{id:\d+}", ["controller" => "tablets", "action" => "viewone", "middleware" => "auth"]);
$router->add("/tablets/edit/{id:\d+}", ["controller" => "tablets", "action" => "editTablet", "middleware" => "auth"]);
$router->add("/tablets/update/{id:\d+}", ["controller" => "tablets", "action" => "updateTablet", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/tablets/delete/{id:\d+}", ["controller" => "tablets", "action" => "deleteTablet", "middleware" => "auth"]);
$router->add("/tablets/destroy/{id:\d+}", ["controller" => "tablets", "action" => "destroyTablet", "method" => "post", "middleware" => "auth"]);

// Report Views (Tablets)
$router->add("/tablets/reportall", ["controller" => "tablets", "action" => "reportAll"]);

// *************************************************************************************************************************************************//

// Admin Pages (Phone Listings)
$router->add("/phones/all", ["controller" => "phones", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/phones/add", ["controller" => "phones", "action" => "addNewPhone", "middleware" => "auth"]);
$router->add("/phones/create", ["controller" => "phones", "action" => "create", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/phones/one/{id:\d+}", ["controller" => "phones", "action" => "viewone", "middleware" => "auth"]);
$router->add("/phones/edit/{id:\d+}", ["controller" => "phones", "action" => "editPhone", "middleware" => "auth"]);
$router->add("/phones/update/{id:\d+}", ["controller" => "phones", "action" => "updatePhone", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/phones/delete/{id:\d+}", ["controller" => "phones", "action" => "deletePhone", "middleware" => "auth"]);
$router->add("/phones/destroy/{id:\d+}", ["controller" => "phones", "action" => "destroyPhone", "method" => "post", "middleware" => "auth"]);

// Report Views (Phone Listings)
$router->add("/phones/directory", ["controller" => "phones", "action" => "reportAll"]);
$router->add("/phones/updatePhones", ["controller" => "phones", "action" => "updatePhones"]);
$router->add("/phones/emailSuccess", ["controller" => "phones", "action" => "emailSuccess"]);

// *************************************************************************************************************************************************//
// Admin Pages (Mailroom Listings)
$router->add("/mailrooms/all", ["controller" => "mailrooms", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/mailrooms/add", ["controller" => "mailrooms", "action" => "addNewName", "middleware" => "auth"]);
$router->add("/mailrooms/create", ["controller" => "mailrooms", "action" => "create", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/mailrooms/one/{id:\d+}", ["controller" => "mailrooms", "action" => "viewone", "middleware" => "auth"]);
$router->add("/mailrooms/edit/{id:\d+}", ["controller" => "mailrooms", "action" => "editName", "middleware" => "auth"]);
$router->add("/mailrooms/update/{id:\d+}", ["controller" => "mailrooms", "action" => "updateName", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/mailrooms/delete/{id:\d+}", ["controller" => "mailrooms", "action" => "deleteName", "middleware" => "auth"]);
$router->add("/mailrooms/destroy/{id:\d+}", ["controller" => "mailrooms", "action" => "destroyName", "method" => "post", "middleware" => "auth"]);

// Report Views (Mailroom Listings)
$router->add("/mailrooms/reportall", ["controller" => "mailrooms", "action" => "reportAll"]);

// *************************************************************************************************************************************************//

// Admin Pages (Cell Listings)
$router->add("/cells/all", ["controller" => "cells", "action" => "viewAll", "middleware" => "auth"]);
$router->add("/cells/add", ["controller" => "cells", "action" => "addNewCell", "middleware" => "auth"]);
$router->add("/cells/create", ["controller" => "cells", "action" => "create", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/cells/one/{id:\d+}", ["controller" => "cells", "action" => "viewone", "middleware" => "auth"]);
$router->add("/cells/edit/{id:\d+}", ["controller" => "cells", "action" => "editCell", "middleware" => "auth"]);
$router->add("/cells/update/{id:\d+}", ["controller" => "cells", "action" => "updateCell", "method" => "post", "middleware" => "auth|trim"]);
$router->add("/cells/delete/{id:\d+}", ["controller" => "cells", "action" => "deleteCell", "middleware" => "auth"]);
$router->add("/cells/destroy/{id:\d+}", ["controller" => "cells", "action" => "destroyCell", "method" => "post", "middleware" => "auth"]);

// Report Views (Cell Listings)
$router->add("/cells/reportall", ["controller" => "cells", "action" => "reportAll"]);

// *************************************************************************************************************************************************//

// Admin Pages (Program's Admin Listings)
$router->add("/programs/dashboard", ["controller" => "admins", "action" => "dashboard", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/all", ["controller" => "admins", "action" => "viewAll", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/add", ["controller" => "admins", "action" => "addNewAdmin", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/create", ["controller" => "admins", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/admins/one/{id:\d+}", ["controller" => "admins", "action" => "viewone", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/edit/{id:\d+}", ["controller" => "admins", "action" => "editAdmin", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/update/{id:\d+}", ["controller" => "admins", "action" => "updateAdmin", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/admins/delete/{id:\d+}", ["controller" => "admins", "action" => "deleteAdmin", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/admins/destroy/{id:\d+}", ["controller" => "admins", "action" => "destroyAdmin", "method" => "post", "middleware" => "auth", "namespace" => "Programs"]);


// *************************************************************************************************************************************************//

// Admin Pages (Contractor Listings)
$router->add("/programs/contractors/all", ["controller" => "contractors", "action" => "viewAll", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/contractors/add", ["controller" => "contractors", "action" => "addNewContractor", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/contractors/create", ["controller" => "contractors", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/contractors/one/{id:\d+}", ["controller" => "contractors", "action" => "viewone", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/contractors/edit/{id:\d+}", ["controller" => "contractors", "action" => "editContractor", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/contractors/update/{id:\d+}", ["controller" => "contractors", "action" => "updateContractor", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/contractors/delete/{id:\d+}", ["controller" => "contractors", "action" => "deleteContractor", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/contractors/destroy/{id:\d+}", ["controller" => "contractors", "action" => "destroyContractor", "method" => "post", "middleware" => "auth", "namespace" => "Programs"]);

// *************************************************************************************************************************************************//

// Admin Pages (Contractor Listings)
$router->add("/programs/volunteers/all", ["controller" => "volunteers", "action" => "viewAll", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/volunteers/add", ["controller" => "volunteers", "action" => "addNewVolunteer", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/volunteers/create", ["controller" => "volunteers", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/volunteers/one/{id:\d+}", ["controller" => "volunteers", "action" => "viewone", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/volunteers/edit/{id:\d+}", ["controller" => "volunteers", "action" => "editVolunteer", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/volunteers/update/{id:\d+}", ["controller" => "volunteers", "action" => "updateVolunteer", "method" => "post", "middleware" => "auth|trim", "namespace" => "Programs"]);
$router->add("/programs/volunteers/delete/{id:\d+}", ["controller" => "volunteers", "action" => "deleteVolunteer", "middleware" => "auth", "namespace" => "Programs"]);
$router->add("/programs/volunteers/destroy/{id:\d+}", ["controller" => "volunteers", "action" => "destroyVolunteer", "method" => "post", "middleware" => "auth", "namespace" => "Programs"]);

// *************************************************************************************************************************************************//

// Admin Pages (Warehouse Administration Pages)
$router->add("/warehouse/dashboard", ["controller" => "admins", "action" => "dashboard", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/all", ["controller" => "admins", "action" => "viewAll", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/add", ["controller" => "admins", "action" => "addNewAdmin", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/create", ["controller" => "admins", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/one/{id:\d+}", ["controller" => "admins", "action" => "viewone", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/edit/{id:\d+}", ["controller" => "admins", "action" => "editAdmin", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/update/{id:\d+}", ["controller" => "admins", "action" => "updateAdmin", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/delete/{id:\d+}", ["controller" => "admins", "action" => "deleteAdmin", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/admins/destroy/{id:\d+}", ["controller" => "admins", "action" => "destroyAdmin", "method" => "post", "middleware" => "auth", "namespace" => "Warehouse"]);

// Approve/Deny Page
$router->add("/warehouse/managers/request/one/{id:\d+}", ["controller" => "admins", "action" => "viewOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/approve/{id:\d+}", ["controller" => "admins", "action" => "approveOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/approve_print/{id:\d+}", ["controller" => "admins", "action" => "approvePrint", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/print/{id:\d+}", ["controller" => "admins", "action" => "print", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/deny_note/{id:\d+}", ["controller" => "admins", "action" => "deny", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/deny/{id:\d+}", ["controller" => "admins", "action" => "denyOrder", "middleware" => "auth", "namespace" => "Warehouse", "method" => "post"]);
$router->add("/warehouse/managers/request/edit_note/{id:\d+}", ["controller" => "admins", "action" => "edit", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/edit/{id:\d+}", ["controller" => "admins", "action" => "editOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/request/update/{id:\d+}", ["controller" => "admins", "action" => "updateOrder", "middleware" => "auth", "namespace" => "Warehouse"]);

// History Pages
$router->add("/warehouse/managers/history/dashboard", ["controller" => "admins", "action" => "historyDashboard", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/history/yearly", ["controller" => "admins", "action" => "yearly", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/history/monthly", ["controller" => "admins", "action" => "monthly", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/history/denied", ["controller" => "admins", "action" => "denied", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/managers/history/denied/{id:\d+}", ["controller" => "admins", "action" => "deniedOne", "middleware" => "auth", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// Warehouse Supervisor pages
$router->add("/warehouse/warehousesupervisors/dashboard", ["controller" => "warehousesupervisors", "action" => "dashboard", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/warehousesupervisors/one/{id:\d+}", ["controller" => "warehousesupervisors", "action" => "dashboard", "middleware" => "auth", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// Admin Pages (Warehouse Supply Request Items)
$router->add("/warehouse/items/all", ["controller" => "items", "action" => "viewAll", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/add", ["controller" => "items", "action" => "addNewItem", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/create", ["controller" => "items", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/one/{id:\d+}", ["controller" => "items", "action" => "viewone", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/edit/{id:\d+}", ["controller" => "items", "action" => "editItem", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/addpicture/{id:\d+}", ["controller" => "items", "action" => "addPicture", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/processpicture/{id:\d+}", ["controller" => "items", "action" => "processPicture", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/update/{id:\d+}", ["controller" => "items", "action" => "updateItem", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/delete/{id:\d+}", ["controller" => "items", "action" => "deleteItem", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/items/destroy/{id:\d+}", ["controller" => "items", "action" => "destroyItem", "method" => "post", "middleware" => "auth", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// Admin Pages (Warehouse Supply Request Item Type CRUD)
$router->add("/warehouse/itemtype/all", ["controller" => "itemtypes", "action" => "viewAll", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/add", ["controller" => "itemtypes", "action" => "addNewItemType", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/create", ["controller" => "itemtypes", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/one/{id:\d+}", ["controller" => "itemtypes", "action" => "viewone", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/edit/{id:\d+}", ["controller" => "itemtypes", "action" => "editItemType", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/update/{id:\d+}", ["controller" => "itemtypes", "action" => "updateItemType", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/delete/{id:\d+}", ["controller" => "itemtypes", "action" => "deleteItemType", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/itemtype/destroy/{id:\d+}", ["controller" => "itemtypes", "action" => "destroyItemType", "method" => "post", "middleware" => "auth", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// Admin Pages (Warehouse Supply Request Section CRUD)
$router->add("/warehouse/sections/all", ["controller" => "sections", "action" => "viewAll", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/add", ["controller" => "sections", "action" => "addNewSection", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/create", ["controller" => "sections", "action" => "create", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/one/{id:\d+}", ["controller" => "sections", "action" => "viewone", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/edit/{id:\d+}", ["controller" => "sections", "action" => "editSection", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/update/{id:\d+}", ["controller" => "sections", "action" => "updateSection", "method" => "post", "middleware" => "auth|trim", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/delete/{id:\d+}", ["controller" => "sections", "action" => "deleteSection", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/sections/destroy/{id:\d+}", ["controller" => "sections", "action" => "destroySection", "method" => "post", "middleware" => "auth", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// WSR User Pages
$router->add("/warehouse/users/section", ["controller" => "users", "action" => "info", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/users/items", ["controller" => "users", "action" => "items", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/users/verify", ["controller" => "users", "action" => "verify", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/users/update", ["controller" => "users", "action" => "update", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/users/submit", ["controller" => "users", "action" => "submit", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/users/success", ["controller" => "users", "action" => "success", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);

// *************************************************************************************************************************************************//

// WSR Supervisor Pages
$router->add("/warehouse/supervisors/dashboard", ["controller" => "supervisors", "action" => "dashboard", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/cancel/{id:\d+}", ["controller" => "supervisors", "action" => "cancel", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/cancelrequest", ["controller" => "supervisors", "action" => "cancelSuccess", "middleware" => "auth", "namespace" => "Warehouse"]);

// Creating Request Pages
$router->add("/warehouse/supervisors/section", ["controller" => "supervisors", "action" => "section", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/items", ["controller" => "supervisors", "action" => "items", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/verify", ["controller" => "supervisors", "action" => "verify", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/update", ["controller" => "supervisors", "action" => "update", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/submit", ["controller" => "supervisors", "action" => "submit", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/success", ["controller" => "supervisors", "action" => "success", "middleware" => "auth|store_wsr_info", "namespace" => "Warehouse"]);

// Submited Order Approve/Deny Pages
$router->add("/warehouse/supervisors/request/one/{id:\d+}", ["controller" => "supervisors", "action" => "viewOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/request/approve/{id:\d+}", ["controller" => "supervisors", "action" => "approveOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/request/deny/{id:\d+}", ["controller" => "supervisors", "action" => "denyOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/request/edit/{id:\d+}", ["controller" => "supervisors", "action" => "editOrder", "middleware" => "auth", "namespace" => "Warehouse"]);
$router->add("/warehouse/supervisors/request/update/{id:\d+}", ["controller" => "supervisors", "action" => "updateOrder", "middleware" => "auth", "namespace" => "Warehouse"]);

// Blanket Route
// $router->add("/{controller}/{action}");
// $router->add("/{controller}/{action}/{id:\d+}");

return $router;