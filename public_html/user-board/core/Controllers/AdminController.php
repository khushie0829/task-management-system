<?php
require_once "core/Controllers/BaseController.php";

class AdminController extends BaseController
{
    
     public function ManageAdminView()
    {
        $data['title'] = "Manager admin";
        return $this->view("manage_admin", $data);
    }
   public function AddAdminView()
    {
        $data['title'] = "Manager admin";
        return $this->view("add_admin", $data);
    }
   
}
