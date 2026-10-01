<?php
require_once "core/Controllers/BaseController.php";

class Dashboard extends BaseController
{
    public function Home()
    {
        $data['title'] = "Dashboard";
        return $this->view("home", $data);
    }
}
