<?php

require_once("lib/functions.php");

if (isset($_GET["u"]))
{
    if (isset($_GET["i"]) && $_GET["i"] == -1){
        // elutasit
        sp2("visszaigazol", array(":masik" => $_GET["u"], ":userid" => $_SESSION["user"], ":tipusid"=>2));

    } else {
        sp2("visszaigazol", array(":masik" => $_GET["u"], ":userid" => $_SESSION["user"], ":tipusid"=>1));
    }
}

redirect("baratok.php");

?>