<?php
require_once("lib/functions.php");
?>

<html>
    <head>
        <title>SOCIAL</title>
        <link rel="stylesheet" type="text/css" href="css/social.css">
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
        echo("<div class=\"uzenet\">");
        // echo("<div>".$uzenet["K"]."</div>");
        echo("<span><img class=\"img\" src=\"img.php?id=".$uzenet["KEP_ID"]."\" /></span>");
        echo("<span class=\"szoveg\">".$uzenet["SZOVEG"]."</span>");
        // echo("<div>".$uzenet["LETREHOZVA"]."</div>");
        echo("</div>");
    }

    if (isset($_GET["u"]))
    {
        $u = $_GET["u"];
        echo("<form action=\"sendmessage.php?u=$u\" method=\"post\">");
        echo("<textarea name=\"msg\" rows=5 cols=80 ></textarea>");
        echo("<button type=\"submit\">Küld</button>");
        echo("</form>");
    }
?>
    </body>
</html>