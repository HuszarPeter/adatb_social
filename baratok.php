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
    <h1>Barátok</h1>
<?php
    $friends = sp("friends", array(":userid" => $_SESSION["user"]));
    foreach($friends as $friend)
    {
        echo("<div class=\"barat\" class=\"barat\">");
        echo("<div><img src=\"img.php?id=".$friend["FELHASZNALO_ID"]."\" class=\"img\" />");
        switch($friend["TIPUS"])
        {
            case 0:
                echo("<span>(Függő)</span>");
                break;
            case 1:
                echo("<span>(Visszaigazolt)</span>");
                break;
            case 2:
                echo("<span>(Elutasítva)</span>");
                break;
        }
        echo($friend["NEV"]."</div>");
        if ($friend["TIPUS"] == 0 && $friend["CEL_FELHASZNALO_ID"] == $_SESSION["user"])
        {
            echo ("<div><a href=\"visszaigazol.php?u=".$friend["FELHASZNALO_ID"]."\">Visszaigazol</a></div>");
        }
        else if ($friend["TIPUS"] == 1)
        {
            echo("<div><a href=\"messages.php?u=".$friend["FELHASZNALO_ID"]."\">Üzenetek</a></div>");
        }
        echo("</div>");
    }
?>
    </body>
</html>