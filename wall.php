<?php
require_once("lib/functions.php");
?>

<html>
    <head>
        <title>SOCIAL</title>
    </head>
    <body>
    <?php include_once("fejlec.php");?>
<?php

    $bejegyzesek = sp("FAL", array(":userid" => 3));
    foreach($bejegyzesek as $row)
    {
        echo("<div class=\"bejegyzes\">");
        echo("<div class=\"szerzo\">" . $row["NEV"] . "</div>");
        echo("<div class=\"szoveg\">".$row["SZOVEG"]."</div>");
        echo("<div class=\"tagek\">".$row["TAGEK"]."</div>");
        echo("</div>");
    }
?>
    </body>
</hrml>