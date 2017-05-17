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
        echo("<div>");
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
        echo("<div><a href=\"messages.php?u=".$friend["FELHASZNALO_ID"]."\">Üzenetek</a></div>");
        echo("</div>");
    }
?>
    </body>
</html>