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

function authorize($statement)
{
    if ($statement) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    
    require base_path('views/' . $path);
}
