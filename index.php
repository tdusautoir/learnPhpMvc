<?php
spl_autoload_register(function($class){
    $class = str_replace('\\', '/', $class);
    include_once($class . ".php");
});

$json = file_get_contents("route.json");

$routes = json_decode($json);

$result = [];
foreach ($routes as $route) {
    if(preg_match("|^".$route->path. "$|",$_SERVER["REQUEST_URI"]) && $route->method == $_SERVER["REQUEST_METHOD"]){
        array_push($result, $route);
    }
}
if (count($result) == 1) {
    // $match are the queries parameters
    preg_match("|^".$result[0]->path. "$|",$_SERVER["REQUEST_URI"],$match);
    unset($match[0]);
    $controllerName = "\\Controller\\" .$result[0]->controller."Controller";
    $controller = new $controllerName();

    $controller->{$result[0]->action}(...$match);
} else {
    echo 'pas de route :(';
}
