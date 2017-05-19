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
    <h1>Névnaposok, szülinaposok</h1>
<?php

    $nevnaposok = sp("nevnaposok", array(":userid" => $_SESSION["user"]));
    foreach($nevnaposok as $nevnapos)
    {
        $lbl = $nevnapos["NEVNAP"] == "1" ? "Névnap: " : "Szülinap :";
        $datum = $nevnapos["NEVNAP"] == "1" 
            ? $honapok[$nevnapos["NEVNAPHONAP"]-1].". ".$nevnapos["NEVNAPNAP"]
            : $honapok[$nevnapos["SZULHONAP"]-1].". ".$nevnapos["SZULNAP"];

        echo("<div>".$nevnapos["NEV"]."</div>");
        echo("<div>$lbl $datum</div>");
    }
?>
    </body>
</html>