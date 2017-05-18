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
        echo("<div class=\"bejegyzes\" style=\"margin: 5px; border: solid 1px red;\">");
        echo("<div class=\"szerzo\">" . $bejegyzes["NEV"] . "</div>");
        echo("<div class=\"szoveg\">".$bejegyzes["SZOVEG"]."</div>");
        echo("<div class=\"tagek\">".$bejegyzes["TAGEK"]."</div>");
        echo("</div>");
    }
?>
    </body>
</html>