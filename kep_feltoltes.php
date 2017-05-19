<?php

require_once("lib/functions.php");
dump($_FILES);
if (isset($_FILES['kep']) && $_FILES['kep']['size'] > 0 ) 
{ 
   $tmpName  = $_FILES['kep']['tmp_name'];  
   $fp = fopen($tmpName, 'rb'); // read binary

   try
    {
        $conn = getConnection();
      
        $stmt = $conn->prepare("INSERT INTO KEP (TULAJDONOS_ID,KEPADAT) VALUES (:userid , EMPTY_BLOB()) RETURNING KEPADAT INTO :kpe");
        $stmt->bindParam(":userid", $_SESSION["user"]);
        $stmt->bindParam(":kpe", $fp, PDO::PARAM_LOB);
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