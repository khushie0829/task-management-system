<?php
require_once "core/Routes.php";

$routes = new Routes();

$routes->get("", "Dashboard::Home");
$routes->get("manage_user", "UserController::UserManager");
$routes->get("add-users", "UserController::UserAdd");
$routes->get("manage-admin", "AdminController::ManageAdminView");
$routes->get("add-admin", "AdminController::AddAdminView");
$routes->get("task", "TaskController::AddTaskmanage");
$routes->get("task-manage", "TaskController::TaskManageview");
$routes->get("role", "roleController::rolemanage");
$routes->get("manage-role", "roleController::roleManageview");




$routes->load();
 