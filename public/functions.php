<?php

require "Response.php";
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
