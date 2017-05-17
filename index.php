<?php
    session_start();
    if (isset($_SESSION["user"]))
    {
        // redirect to inner page
        header("Location: wall.php");
        exit();
    }
?>
<html>
    <head>
        <title>Social</title>
    </head>
</html>
<body>
    <form method="post" action="login.php">
        Usernév:<br/><input type="text" /><br/>
        Jelszó:<br/><input type="password" /> 
        <br/><button type="submit">Login</button>
        <a href="register.php" >Regisztráció</a>
    </form>
</body>
<?php
/*echo("<pre>");

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

echo("</pre>");*/
?>