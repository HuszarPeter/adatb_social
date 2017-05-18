<?php

require_once("lib/functions.php");

if(isset($_POST["szoveg"]))
{
    try
    {
        $conn = getConnection();
        $conn->beginTransaction();

        $bejegyzesID = insert($conn, "INSERT INTO BEJEGYZES (SZOVEG, SZERZO_FELHASZNALO_ID) VALUES ('".$_POST["szoveg"]."', ".$_SESSION["user"].")", "BEJEGYZES_ID");

        if (isset($_POST["tagek"]) && strlen($_POST["tagek"])>0)
        {
            $tagek = explode(" ", $_POST["tagek"]);

            foreach($tagek as $tag)
            {
                $tagRow = fetch($conn, "SELECT CIMKE_ID FROM CIMKE WHERE NEV='$tag'");
                if ($tagRow) {
                    // van, szóval go insert the kapcsolo tábla record
                    $tagid = $tagRow["CIMKE_ID"];
                } else {
                    $tagid = insert($conn, "INSERT INTO CIMKE (NEV) values ('$tag')", "CIMKE_ID");
                }

                insert($conn, "INSERT INTO BEJEGYZES_CIMKE (BEJEGYZES_ID, CIMKE_ID) VALUES ($bejegyzesID, $tagid)");
            }
        }
        $conn->commit();

        $conn = null;
    }
    catch(PDOException $e)
    {   
        $conn->rollBack();
        die($e->getMessage());
    }
}

redirect("wall.php");

?>