<?php

require_once("lib/functions.php");

try
{
    $s = file_get_contents("sp/messages.sql");

    $conn = getConnection();

    $stmt = $conn->prepare($s);
    $stmt->execute(array(":userid"=>3, ":masik"=>4));
    $result = $stmt->fetchAll(PDO::FETCH_GROUP | PDO::FETCH_ASSOC);

    dump($result);


    $conn = null;
}
catch(PDOException $e)
{
    die($e->getMessage());
}

?>