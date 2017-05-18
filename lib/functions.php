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
    $result = new PDO("oci:dbname=".$config["db"]["tns"].";charset=utf8",$config["db"]["user"],$config["db"]["pwd"]);
    $result->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $result;
}

function fetch($conn, $query)
{
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetch();
    return $result;
}

function q($sql)
{
    global $config;
    try
    {
        $conn = getConnection();
        $result = query($conn, $sql);
        $conn = null;
        return $result;
    }
    catch(PDOException $e)
    {
        echo($e->getMessage());
    }
}

function query($conn, $query)
{
    $statement = $conn->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    return $result;
}

function sp($spname, $params = array())
{
    global $config;
    try
    {
        $conn = getConnection();
        $result = callStoredProcedure($conn, $spname, $params);
        $conn = null;
        return $result;
    }
    catch(PDOException $e)
    {
        echo($e->getMessage());
    }
}

function sp2($spname, $params = array())
{
    global $config;
    try
    {
        $conn = getConnection();
        $result = callStoredProcedure2($conn, $spname, $params);
        $conn = null;
        return $result;
    }
    catch(PDOException $e)
    {
        echo($e->getMessage());
    }
}

function callStoredProcedure($conn, $spname, $params = array())
{
    $sp = file_get_contents("sp/$spname.sql");
    $statement = $conn->prepare($sp);
    $s = $statement->execute($params);
    $result = $statement->fetchAll();
    return $result;
}

function callStoredProcedure2($conn, $spname, $params = array())
{
    $sp = file_get_contents("sp/$spname.sql");
    $statement = $conn->prepare($sp);
    $s = $statement->execute($params);
    return $s;
}

function getUserByLoginAndPassword($user, $password)
{
    global $config;

    try
    {
        $conn = getConnection();

        $sql = "SELECT * FROM FELHASZNALO WHERE FELHASZNALO_NEV = '$user' AND JELSZO_HASH = '$password'";
        $userRow = fetch($conn, $sql);

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