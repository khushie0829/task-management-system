<?php
require_once "core/Controllers/BaseController.php";

class TaskController extends BaseController
{
    
     public function AddTaskmanage()
    {
        $data['title'] = " Task  ";
        return $this->view("task", $data);
    }
   public function TaskManageview()
    {
        $data['title'] = " Manager Task";
        return $this->view("task_manage", $data);
    }
   
}
