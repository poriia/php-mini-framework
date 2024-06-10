<?php

$routes = require "routes.php";

function routeToController($uri, $routes)
{
    if (!array_key_exists($uri, $routes)) {
        abort(404);
    }

    require $routes[$uri];
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/$code.view.php";
    die();
}

$uri = parse_url(uri())['path'];

routeToController($uri, $routes);
