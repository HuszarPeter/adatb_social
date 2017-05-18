<?php

require_once("lib/functions.php");

if (isset($_GET["p"])) {

    try
    {
        $conn = getConnection();

        execute($conn, "DELETE FROM BEJEGYZES WHERE BEJEGYZES_ID=".$_GET["p"]);

    }
    catch(PDOException $e){
        die($e->getMessage());
    }
}

redirect("wall.php");

?>