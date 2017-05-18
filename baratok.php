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
    $friends = sp("friends", array(":userid" => $_SESSION["user"]));
    foreach($friends as $friend)
    {
        echo("<div class=\"barat\" style=\"margin: 5px; border: solid 1px red;\">");
        echo("<div>");
        switch($friend["TIPUS"])
        {
            case 0:
                echo("<span>Függő </span>");
                break;
            case 1:
                echo("<span>Visszaigazolt </span>");
                break;
            case 2:
                echo("<span>Elutasítva </span>");
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