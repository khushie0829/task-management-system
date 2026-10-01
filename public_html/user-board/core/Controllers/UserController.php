<?php
require_once "core/Controllers/BaseController.php";

class UserController extends BaseController
{
    public function UserManager()
    {
        $data['title'] = "User Manager";
        return $this->view("manage_user", $data);
    }
    public function UserAdd()
    {
        $data['title'] = "Add Manager";
        return $this->view("add_users", $data);
    }
    
   
}
