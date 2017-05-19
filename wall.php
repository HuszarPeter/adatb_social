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
    try
    {
        $conn = getConnection();

        $bejegyzesek = callStoredProcedure($conn, "FAL", array(":userid" => $_SESSION["user"]));
        foreach($bejegyzesek as $bejegyzes)
        {
            echo("<div class=\"bejegyzes\">");
            if ($bejegyzes["FELHASZNALO_ID"] == $_SESSION["user"]) {
                echo("<div class=\"delete\"><a href=\"delete_post.php?p=".$bejegyzes["BEJEGYZES_ID"]."\">törlés</a></div>");
            }
            echo("<div><img src=\"img.php?id=".$bejegyzes["KEP_ID"]."\" class=\"img\" /><div class=\"szerzo\">" . $bejegyzes["NEV"] . "</div></div>");
            echo("<div class=\"szoveg\">".$bejegyzes["SZOVEG"]."</div>");

            $kepek = query($conn, "SELECT KEP_ID FROM BEJEGYZES_KEP WHERE BEJEGYZES_ID = " . $bejegyzes["BEJEGYZES_ID"]);
            foreach($kepek as $kep)
            {
                echo("<img src=\"img.php?id=".$kep["KEP_ID"]."\" class=\"wall_img\">");
            }
            echo("<div style=\"clear: both\"></div>");
            echo("<div class=\"tagek\">".$bejegyzes["TAGEK"]."</div>");

            echo("</div>");
        }
    }
    catch(PDOException $e)
    {
        die($e->getMessage());
    }
?>
    </body>
</html>