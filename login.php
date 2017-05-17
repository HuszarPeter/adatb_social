<?php

include_once("lib/functions.php");

if (isset($_POST["usernev"]) && isset($_POST["jelszo"]))
{
    // van jelszo, csinaljunk md5-ot
    // ellenorizzuk le a db-ben
    // ha van akkor -> wall.php + session admin!
    // ha nincs akkor -> index.php
    $success = getUserByLoginAndPassword($_POST["usernev"], $_POST["jelszo"]);
    if ($success)
    {
        redirect("wall.php");
    }
}

redirect("index.php");

?>