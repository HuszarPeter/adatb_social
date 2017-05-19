<?php

require_once("lib/functions.php");

if (isset($_POST["album"])) {

    try
    {
        $conn = getConnection();

        execute($conn, "INSERT INTO ALBUM (TULAJDONOS_ID,CIM,LATHATOSAG) VALUES (".$_SESSION["user"].",'".$_POST["album"]."',1)");

    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}

redirect("albumok.php");

?>