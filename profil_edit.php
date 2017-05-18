<?php

include_once("lib/functions.php");
dump($_POST);
if (isset($_POST["jelszo"]) && isset($_POST["email"]))
{
   
    try
      {
            $newdatum = date('d-m-Y h:i:s', strtotime($_POST["szulido"]));
            $datum = (strlen($_POST["szulido"]) > 0) ?  $newdatum : "NULL";
            $keresztnev = (strlen($_POST["keresztnev"]) > 0) ? $_POST["keresztnev"] : "NULL";
            $vezeteknev = (strlen($_POST["vezeteknev"]) > 0) ? $_POST["vezeteknev"] : "NULL";
            $nevnapho = (strlen($_POST["nevnapho"]) > 0) ? $_POST["nevnapho"] : "NULL";
            $nevnapnap = (strlen($_POST["nevnapnap"]) > 0) ? $_POST["nevnapnap"] : "NULL";

            $conn = getConnection();
            $sql = "UPDATE FELHASZNALO SET JELSZO_HASH = '".$_POST["jelszo"]."', EMAIL='".$_POST["email"]."', SZULETETT = to_date('".$datum."','dd-mm-yy hh24:mi:ss'), KERESZTNEV='".$keresztnev."', VEZETEKNEV='".$vezeteknev."', NEVNAPHONAP=".$nevnapho.", NEVNAPNAP=".$nevnapnap." WHERE FELHASZNALO_ID = ".$_SESSION["user"]."";
            dump($sql);
            insert($conn, $sql);
            $conn = null;
        } 
    catch(PDOException $e) 
        {
            echo ($e->getMessage());
        }
   // redirect("index.php");
    
}




?>