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
    <h1>Klubok</h1>
    <div>
<?php
    $csoportok = sp ("csoport_list", array(":userid" => $_SESSION["user"]));
    foreach($csoportok as $csoport)
    {
        $id = $csoport["CSOPORT_ID"];
        $nev = $csoport["NEV"];
        $leiras = $csoport["LEIRAS"];
        $tagok = $csoport["CNT"];
        echo("<div class=\"csoport\">");
        echo("<div class=\"nev\">$nev ($tagok)</div>");
        echo("<div class=\"leiras\">$leiras</div>");

        $tagok = sp ("csoport_tagok", array(":csoportid" => $id));
        foreach($tagok as $tag)
        {
            $nev = $tag["NEV"];
            echo ("<div class=\"tag\">$nev </div>");
        }

        echo("<a href=\"klub_kilep.php?id=$id\">Kilépek</a>");
        echo("</div>");
    }
?>
    <br style="clear:both"/><h1>Ismerősök csoportjai</h1>
<?php
    $ajanl = sp("csoport_ajanl", array(":userid" => $_SESSION["user"]));
    foreach($ajanl as $csoport)
    {
        $id = $csoport["CSOPORT_ID"];
        $nev = $csoport["NEV"];
        $leiras = $csoport["LEIRAS"];
        $tagok = $csoport["CNT"];
        echo("<div class=\"csoport\">");
        echo("<div class=\"nev\">$nev ($tagok)</div>");
        echo("<div class=\"leiras\">$leiras</div>");

        $tagok = sp ("csoport_tagok", array(":csoportid" => $id));
        foreach($tagok as $tag)
        {
            $nev = $tag["NEV"];
            echo ("<div class=\"tag\">$nev </div>");
        }

        echo("<a href=\"klub_belep.php?id=$id\">Belépek</a>");
        echo("</div>");   
    }
?>
    </div>
    <div style="clear: both"></div>
        <fieldset><legend>Klub alapítása</legend>
        <form action="ujklub.php" method="post">
            Név:<br/> <input name="nev" type="text"></input><br/>
            Leírás:<br/> <textarea name="leiras" cols="80" rows=5></textarea><br/>
            <button type="submit">OK</button>
        </form>
        </fieldset>
    </body>
</html>