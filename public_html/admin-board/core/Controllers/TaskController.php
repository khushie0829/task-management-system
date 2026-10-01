<?php
require_once "core/Controllers/BaseController.php";

class TaskController extends BaseController
{
    
     public function AddTaskmanage()
    {
        $data['title'] = "Task  ";
        return $this->view("Task", $data);
    }
   public function TaskManageview()
    {
        $data['title'] = "Task Manager ";
        return $this->view("task_manage", $data);
    }
   
}
