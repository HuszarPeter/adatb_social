<?php

require_once("lib/functions.php");

if (isset($_POST["nev"]) && isset($_POST["leiras"]))
{
    $u = $_SESSION["user"];
    $nev = $_POST["nev"];
    $leiras = $_POST["leiras"];
    try
    {
        $conn = getConnection();
        $conn->beginTransaction();
        $csoportid = insert($conn, "INSERT INTO CSOPORT (NEV, LEIRAS, LETREHOZO_FELHASZNALO_ID, TITKOS) values ('$nev', '$leiras', $u, 0)", "CSOPORT_ID");
        insert($conn, "INSERT INTO CSOPORT_TAG (CSOPORT_ID, TAG_FELHASZNALO_ID) VALUES ($csoportid, $u)");
        $conn->commit();
    }
    catch(PDOException $e)
    {
        $conn->rollBack();
        die($e->getMessage());
    }
}

redirect("klub.php");

?>
