<?php

require_once("lib/functions.php");

if (isset($_GET["id"]))
{
    $u = $_SESSION["user"];
    $id = $_GET["id"];
    i("INSERT INTO CSOPORT_TAG (CSOPORT_ID, TAG_FELHASZNALO_ID) VALUES($id, $u)");
}

redirect("klub.php");

?>