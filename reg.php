<?php

include_once("lib/functions.php");
dump($_POST);
if (isset($_POST["usernev"]) && isset($_POST["jelszo"]) && isset($_POST["email"]))
{
    // van jelszo, csinaljunk md5-ot
    // ellenorizzuk le a db-ben
    // ha van akkor -> wall.php + session admin!
    // ha nincs akkor -> index.php
    $success = getUserByLogin($_POST["usernev"]);
    if ($success)
    {
         redirect("register.php");
       
    }
    try
      {
            dump($_POST);
            $datum = (strlen($_POST["szulido"]) > 0) ? $_POST["szulido"] : "NULL";
            $keresztnev = (strlen($_POST["keresztnev"]) > 0) ? $_POST["keresztnev"] : "NULL";
            $vezeteknev = (strlen($_POST["vezeteknev"]) > 0) ? $_POST["vezeteknev"] : "NULL";
            $nevnapho = (strlen($_POST["nevnapho"]) > 0) ? $_POST["nevnapho"] : "NULL";
            $nevnapnap = (strlen($_POST["nevnapnap"]) > 0) ? $_POST["nevnapnap"] : "NULL";

            $conn = getConnection();
            $sql = "INSERT INTO FELHASZNALO (FELHASZNALO_NEV, JELSZO_HASH, EMAIL, SZULETETT, KERESZTNEV, VEZETEKNEV, NEVNAPHONAP, NEVNAPNAP) VALUES ('".$_POST["usernev"]."', '".$_POST["jelszo"]."', '".$_POST["email"]."', ".$datum.", '".$keresztnev."', '".$vezeteknev."', ".$nevnapho.", ".$nevnapnap.")";
            dump($sql);
            insert($conn, $sql);
            $conn = null;
        } 
    catch(PDOException $e) 
        {
            echo ($e->getMessage());
        }
    redirect("index.php");
    
}




?>