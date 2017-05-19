<?php

require_once("lib/functions.php");

if (isset($_GET["p"])) {

    try
    {
        $conn = getConnection();

        execute($conn, "DELETE FROM KEP WHERE KEP_ID=".$_GET["p"]);

    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}

redirect("albumok.php");

?>