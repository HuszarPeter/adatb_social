<?php
require_once("config.inc");

session_start();

function redirect ($url)
{
    header ("Location: $url");
}

function dump($variable)
{
    echo("<pre>");
    var_dump($variable);
    echo("</pre>");
}

function getConnection()
{
    global $config;
    return new PDO("oci:dbname=".$config["db"]["tns"].";charset=utf8",$config["db"]["user"],$config["db"]["pwd"]);
}

function getUserByLoginAndPassword($user, $password)
{
    global $config;

    try
    {
        $conn = getConnection();

        $sql = "SELECT * FROM FELHASZNALO WHERE FELHASZNALO_NEV = '$user' AND JELSZO_HASH = '$password'";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $userRow = $statement->fetch();

        if (!$userRow)
        {
            return false;
        }

        $_SESSION["user"] = $userRow["FELHASZNALO_ID"];

        $conn = null;

        return true;
    } 
    catch(PDOException $e) 
    {
        echo ($e->getMessage());
    }
}

?>