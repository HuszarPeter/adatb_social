<?php

require_once("lib/functions.php");

if (isset($_GET["id"]))
{
    try
    {
       // $a = (strlen($_POST["nevnapho"])>0) ? $_POST["nevnapho"] : "NULL";
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT KEPADAT FROM KEP WHERE KEP_ID=?");
        $stmt->execute(array($_GET["id"]));
        $a = $stmt->fetchAll();
        $xxx = stream_get_contents($a[0]["KEPADAT"]);
        header("Content-Type: image/jpeg");
        echo($xxx);
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
}

?>