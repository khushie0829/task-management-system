<?php
require_once "core/Controllers/BaseController.php";

class AdminController extends BaseController
{
    
     public function ManageAdminView()
    {
        $data['title'] = "Admin Manager";
        return $this->view("manage_admin", $data);
    }
   public function AddAdminView()
    {
        $data['title'] = "Add Admin";
        return $this->view("add_admin", $data);
    }
   
}
