<?php

class Routes
{
    protected $routes = [];

    public function get($slug, $file)
    {
        $this->routes[$slug] = $file;
    }

    protected function getUrlSlug()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public function load()
    {
        $content = $title = null;
        foreach ($this->routes as $k => $file) {
            if ($this->getUrlSlug() == "admin-board/".$k) {
                $d = explode("::", $file);
                $controller = $d[0];
                $method = $d[1];

                require_once "core/Controllers/$controller.php";
                $c = new $controller();
                $d = $c->$method();
                $content = $d['file'];
                $datas = $d['data'];
                foreach ($datas as $k => $data) {
                    $$k = $data;
                }
            }
        }
        if($content) include_once "components/master.php";
        else echo "404 Not Found";
    }
}
