<?php

function requiredVal($input)
{
    if (empty($input)) {
        return true;
    }
    return false;
}


function mindVal($input, $length)
{
    if (strlen($input) < $length) {
        return false;
    }
    return true;
}

function maxdVal($input, $length)
{
    if (strlen($input) > $length) {
        return false;
    }
    return true;
}


//email validate function
function emailval($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}
