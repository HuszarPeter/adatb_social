<?php

require_once("lib/functions.php");

if (isset($_GET["u"])) {
    // insert int baratok
    $en = $_SESSION["user"];
    $masik = $_GET["u"];

    try
    {
        $conn = getConnection();
        insert($conn, "INSERT INTO FELHASZNALO_KAPCSOLAT (KEZDEMENYEZO_FELHASZNALO_ID, CEL_FELHASZNALO_ID, TIPUS) VALUES ($en, $masik, 0)");
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
}

redirect("baratok.php");

?>