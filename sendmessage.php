<?php

require_once("lib/functions.php");

if (isset($_POST["msg"]) && isset($_GET["u"])) {

    $k = $_SESSION["user"];
    $c = $_GET["u"];
    $m = $_POST["msg"];

    try
    {
        $conn = getConnection();

        insert($conn, "INSERT INTO UZENET (SZOVEG, KULDO_FELHASZNALO_ID, CIMZETT_FELHASZNALO_ID) VALUES ('$m', $k, $c)");

        $conn = null;
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
}

$referer = $_SERVER["HTTP_REFERER"];
redirect($referer);

?>