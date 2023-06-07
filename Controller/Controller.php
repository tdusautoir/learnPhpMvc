<?php

namespace Controller;

class Controller {
    protected $controller;
    protected $params = [];

    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function view($template) 
    {
        if(file_exists("View/$this->controller/css/$template.css")) {
            $header = "<link rel='stylesheet' href='View/$this->controller/css/$template.css'";
        }

        ob_start();
        extract($this->params);
        include("View/$this->controller/$template.php");
        $content = ob_get_clean();
        include("View/layout.php");
    }

    public function compact($key, $value) 
    {
        $this->params[$key] = $value;
    }
}