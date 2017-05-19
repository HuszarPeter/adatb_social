<?php

require_once("lib/functions.php");

if (isset($_FILES['kep']) && $_FILES['kep']['size'] > 0 ) 
{ 
   $tmpName  = $_FILES['kep']['tmp_name'];  

   $fp = fopen($tmpName, 'rb'); // read binary

   try
    {
        $conn = getConnection();

        $stmt = $conn->prepare("INSERT INTO KEP (TULAJDONOS_ID,KEPADAT) VALUES (:userid,:kpe)");
        $stmt->bindParam(":userid", $_SESSION["user"]);
        $stmt->bindParam(":kpe", $fp, PDO::PARAM_LOB);
        //$conn->errorInfo();
        $stmt->execute();
     

    }
    catch(PDOException $e){
        die($e->getMessage());
    }

}
redirect("albumok.php");

?>