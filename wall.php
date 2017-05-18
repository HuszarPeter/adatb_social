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
    <h1>Fal</h1>
    <form action="uj_bejegyzes.php" method="POST">
        <div>Szöveg:</div>
        <textarea name="szoveg" rows="5" cols="80"></textarea><br/>
        <div>tagek</div><input type="text" name="tagek"><br/>
        <button type="submit">Mehet</button>
    </form>
<?php
    $bejegyzesek = sp("FAL", array(":userid" => $_SESSION["user"]));
    foreach($bejegyzesek as $bejegyzes)
    {
        echo("<div class=\"bejegyzes\">");
        if ($bejegyzes["FELHASZNALO_ID"] == $_SESSION["user"]) {
            echo("<div class=\"delete\"><a href=\"delete_post.php?p=".$bejegyzes["BEJEGYZES_ID"]."\">törlés</a></div>");
        }
        echo("<div class=\"szerzo\"><img src=\"img.php?id=".$bejegyzes["FELHASZNALO_ID"]."\" class=\"img\" />" . $bejegyzes["NEV"] . "</div>");
        echo("<div class=\"szoveg\">".$bejegyzes["SZOVEG"]."</div>");
        echo("<div class=\"tagek\">".$bejegyzes["TAGEK"]."</div>");
        echo("</div>");
    }
?>
    </body>
</html>