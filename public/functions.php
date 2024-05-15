<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function uri()
{
    return $_SERVER['REQUEST_URI'];
}

function abort($code)
{
    http_response_code($code);
    require "views/$code.view.php";
    die();
}

function getRoute($routes)
{
    $uri = parse_url(uri())['path'];

    if (!array_key_exists($uri, $routes)) {
        abort(404);
    }

    require $routes[$uri];
}