<?php
echo("<pre>");

$tns = "(DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)) ) (CONNECT_DATA = (SERVICE_NAME = XE) ) )";
$db_username = "SOCIAL";
$db_password = "xxx";

try{
    $conn = new PDO("oci:dbname=".$tns.";charset=utf8",$db_username,$db_password);
    foreach($conn->query('SELECT FELHASZNALO_NEV from FELHASZNALO') as $row) {
        print_r($row);
    }
    $dbh = null;

}catch(PDOException $e){
    echo ($e->getMessage());
}

echo("</pre>");
?>