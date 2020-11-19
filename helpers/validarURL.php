<?php
function validateRoute($request_url, $foldername)
{

    $servername = $_SERVER["SERVER_NAME"];

    $url = "http://" . $servername . $request_url;

    if (strpos($url, "$foldername") !== false) {
        $found = true;
    } else {

        $found = false;
    }

    return $found;
}
