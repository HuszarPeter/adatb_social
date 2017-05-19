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
        $u = $_GET["u"];
        $uzenetek = sp("messages", array(":userid" => $_SESSION["user"], ":masik" => $u), PDO::FETCH_GROUP | PDO::FETCH_ASSOC);
        foreach($uzenetek as $nap =>$lista)
        {
            echo("<h2>$nap</h2>");
            foreach($lista as $uzenet)
            {
                echo("<div class=\"uzenet\">");
                echo("<span><img class=\"img\" src=\"img.php?id=".$uzenet["KEP_ID"]."\" /></span>");
                echo("<span class=\"szoveg\">".$uzenet["SZOVEG"]."</span>");
                echo("</div>");
            }
        }
        echo("<form action=\"sendmessage.php?u=$u\" method=\"post\">");
        echo("<textarea name=\"msg\" rows=5 cols=80 ></textarea><br/>");
        echo("<button type=\"submit\">Küld</button>");
        echo("</form>");
    }
    else
    {
        $uzenetek = sp("allmessages", array(":userid" => $_SESSION["user"]));
        foreach($uzenetek as $uzenet)
        {
            echo("<div class=\"uzenet\">");
            echo("<span><img class=\"img\" src=\"img.php?id=".$uzenet["KEP_ID"]."\" /></span>");
            echo("<span class=\"szoveg\">".$uzenet["SZOVEG"]."</span>");
            echo("</div>");
        }
    }
?>
    </body>
</html>