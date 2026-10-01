<?php

class BaseController
{
    protected function view($file, $datas)
    {
        $data = [
            "file" => "pages/$file.php",
            "data" => $datas,
        ];
        return $data;
    }
}
