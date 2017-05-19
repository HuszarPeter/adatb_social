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
    <h1>Képek</h1>
<?php
    $kepek = sp("albumokkepek", array(":userid" => $_SESSION["user"]));
    $albumid = -1;
    foreach($kepek as $kep)
    {
        if ($kep["ALBUM_ID"] != $albumid)
        {
            echo("<h2 class=\"albumheader\">.:".$kep["CIM"].":.</h2>");
            $albumid = $kep["ALBUM_ID"];
        }
        echo("<div class=\"albumkep\"><img class=\"img\" src=\"img.php?id=".$kep["KEP_ID"]."\"></div>");
    }
?>
    </body>
</html>