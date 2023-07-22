<?php

function checkRequestMethod($method)
{
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}

function redirectTo($path)
{
    return header("location:$path");
}

function sanitize($input)
{
    return trim(htmlspecialchars(htmlentities($input)));
}
