<?php

require_once("lib/functions.php");

if (isset($_GET["id"])) {
    $u = $_SESSION["user"];
    $id = $_GET["id"];

    try
    {
        $conn = getConnection();

        execute($conn, "UPDATE FELHASZNALO SET KEP_ID = $id WHERE FELHASZNALO_ID=$u");

    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}

redirect("albumok.php");

?>