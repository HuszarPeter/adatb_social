<?php
require_once("lib/functions.php");
?>

<html>
    <head>
        <title>SOCIAL</title>
    </head>
    <body>
    <?php include_once("fejlec.php");?>
    <h1>Fal</h1>
<?php
    $bejegyzesek = sp("FAL", array(":userid" => $_SESSION["user"]));
    foreach($bejegyzesek as $bejegyzes)
    {
        echo("<div class=\"bejegyzes\" style=\"margin: 5px; border: solid 1px red;\">");
        echo("<div class=\"szerzo\">" . $bejegyzes["NEV"] . "</div>");
        echo("<div class=\"szoveg\">".$bejegyzes["SZOVEG"]."</div>");
        echo("<div class=\"tagek\">".$bejegyzes["TAGEK"]."</div>");
        echo("</div>");
    }
?>
    </body>
</html>