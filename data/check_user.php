<?php 
function enterToPage($b)
{
    if ($b == "off") {
        //pass
    } else {
        if (!isset($_SESSION["sessionID"])) {
            header("Location: ../../data/disabled.html");
        }
    }
}
enterToPage("on");
?>