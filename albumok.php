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
    Albumok létrehozása:
    <form method="post" action="album_letrehozas.php" >
        <input type="text" name="album" value="" required >
        <button type="submit">Album létrehozása</button>  
    </form>
    Képek feltöltése:
    <form enctype="multipart/form-data" action="kep_feltoltes.php" method="post" >
        <input type="file" name="kep" required >
        <input type="submit" value ="Kép feltöltése"/>  
    </form>
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
        if($kep["KEP_ID"] != NULL)
        {
            echo("<div class=\"albumkep\"><img class=\"img\" src=\"img.php?id=".$kep["KEP_ID"]."\">");
            echo("</br><a href=\"delete_kep.php?p=".$kep["KEP_ID"]."\">Törlés</a> | <a href=\"y.php\">Beállítás Profilképként</a></div>");
        }
      
    }
?>
    </body>
</html>