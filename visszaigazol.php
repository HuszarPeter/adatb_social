<?php

require_once("lib/functions.php");

if (isset($_GET["u"]))
{
    sp2("visszaigazol", array(":masik" => $_GET["u"], ":userid" => $_SESSION["user"]));
}

redirect("baratok.php");

?>