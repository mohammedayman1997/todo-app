<?php
function readJsonFile($filepath)
{
    return json_decode(file_get_contents($filepath,true),true);
}

?>