<?php
require_once("lib/functions.php");
?>

<html>
    <head>
        <title>SOCIAL</title>
    </head>
    <body>
    <?php include_once("fejlec.php");?>
    <h1>Üzenetek</h1>
<?php
    if (isset($_GET["u"]))
    {
        $uzenetek = sp("messages", array(":userid" => $_SESSION["user"], ":masik" => $_GET["u"]));
    }
    else
    {
        $uzenetek = sp("allmessages", array(":userid" => $_SESSION["user"]));
    }
    foreach($uzenetek as $uzenet)
    {
        echo("<div class=\"uzenet\" style=\"margin: 5px; border: solid 1px red;\">");
        echo("<div>".$uzenet["K"]."</div>");
        echo("<div>".$uzenet["SZOVEG"]."</div>");
        echo("<div>".$uzenet["LETREHOZVA"]."</div>");
        echo("</div>");
    }
?>
    </body>
</html>