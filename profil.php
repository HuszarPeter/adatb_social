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
    <?php 
    
        $aa = sp("profil", array(":userid" => $_SESSION["user"]));
        $user = $aa[0];

        $honapok = array("Január", "Február", "Március", "Április", "Május", "Június", "Augusztus", "Szeptember", "Október", "November", "December");

    ?>
    <h1>Profil</h1>
    <form method="post" action="profil_edit.php" class="profil">
        <div class="lbl">Felhasználónév</div>
        <div><?php echo($user["FELHASZNALO_NEV"]);?></div>

        <div class="lbl">Email</div>
        <div><?php echo($user["EMAIL"]);?></div>

        <div class="lbl">Név</div>
        <div><?php echo($user["VEZETEKNEV"]);?> <?php echo($user["KERESZTNEV"]);?></div>

        <div class="lbl">Születésnap</div>
        <div><?php echo($user["SZULETETT"]);?></div>

        <div class="lbl">Névnap</div>
        <div><?php echo($honapok[$user["NEVNAPHONAP"]]);?> <?php echo($user["NEVNAPNAP"]);?></div>

        <hr/>
        <br/><button type="submit">OK</button>
    </form>

    </body>
</html>