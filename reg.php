<?php

include_once("lib/functions.php");

if (isset($_POST["usernev"]) && isset($_POST["jelszo"]) && isset($_POST[""]))
{
    // van jelszo, csinaljunk md5-ot
    // ellenorizzuk le a db-ben
    // ha van akkor -> wall.php + session admin!
    // ha nincs akkor -> index.php
    $success = getUserByLogin($_POST["usernev"]);
    if ($success)
    {
        redirect("wall.php");
    }
}

redirect("register.php");

?>