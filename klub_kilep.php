<?php

require_once("lib/functions.php");

if (isset($_GET["id"]))
{
    $u = $_SESSION["user"];
    $id = $_GET["id"];
    e("DELETE FROM CSOPORT_TAG WHERE CSOPORT_ID=$id AND TAG_FELHASZNALO_ID=$u");
}

redirect("klub.php");

?>