<?php

require_once("lib/functions.php");
dump($_FILES);
if (isset($_FILES['kep']) && $_FILES['kep']['size'] > 0 ) 
{ 
   $tmpName  = $_FILES['kep']['tmp_name'];  
   $fp = fopen($tmpName, 'rb'); // read binary
   $albumid = (strlen($_POST["album"]) > 0) ? $_POST["album"] : "NULL";

   try
    {
        $conn = getConnection();
      
        $stmt = $conn->prepare("INSERT INTO KEP (TULAJDONOS_ID,KEPADAT,ALBUM_ID) VALUES (:userid , EMPTY_BLOB(),:album) RETURNING KEPADAT INTO :kpe");
        $stmt->bindParam(":userid", $_SESSION["user"]);
        $stmt->bindParam(":kpe", $fp, PDO::PARAM_LOB);
        $stmt->bindValue(":album",$albumid);
        //$conn->errorInfo();
        
        $conn->beginTransaction();
        $stmt->execute();
        $conn->commit();
        $conn = NULL;

    }
    catch(PDOException $e){
        $conn->rollBack();
        die($e->getMessage());
    }
    fclose($fp);
}
//redirect("albumok.php");

?>