<?php
require_once "core/Controllers/BaseController.php";

class roleController extends BaseController
{
    
     public function rolemanage()
    {
        $data['title'] = " role add ";
        return $this->view("role", $data);
    }
   public function roleManageview()
    {
        $data['title'] = "Manager role";
        return $this->view("manage_role", $data);
    }
   
}
