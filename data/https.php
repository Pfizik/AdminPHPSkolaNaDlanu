<?php

function goHTTPS($a)
{
    if ($a == "off") {
        //pass
    } else {
        if (!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on") {

            header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
            exit;
        } else {
            //echo "radi";
        }
    }
}

goHTTPS("off");
