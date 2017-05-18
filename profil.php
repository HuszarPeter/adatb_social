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

        $honapok = array("Január", "Február", "Március", "Április", "Május", "Június", "Július","Augusztus", "Szeptember", "Október", "November", "December");
        $newdatum = date('Y-m-d', strtotime($user["SZULETETT"]));

    ?>
    <h1>Profil</h1>
    <form method="post" action="profil_edit.php" class="profil">
        <div class="lbl">Felhasználónév:</div>
        <div><?php echo($user["FELHASZNALO_NEV"]);?></div>

        <div class="lbl">Jelszo:</div>
        <input type="password" name="jelszo" value="<?php echo($user["JELSZO_HASH"]);?>" required ><br/>

        <div class="lbl">Email:</div>
        <input type="email" name="email" value="<?php echo($user["EMAIL"]);?>" required ><br/>

        <div class="lbl">Név:</div>
        <input type="text" name="vezeteknev" value="<?php echo($user["VEZETEKNEV"]);?>" required ><br/>
        <input type="text" name="keresztnev" value="<?php echo($user["KERESZTNEV"]);?>" required ><br/>
        
        <div class="lbl">Születésnap:</div>
        <input type="date" name="szulido" value="<?php echo($newdatum);?>" required ><br/>

        <div class="lbl">Névnap:</div>
        <!--<div><?php echo($honapok[$user["NEVNAPHONAP"]-1]);?> <?php echo($user["NEVNAPNAP"]);?></div>-->
        <input type="number" name="nevnapho" value="<?php echo($user["NEVNAPHONAP"]);?>" min="1" max="12" required >Hó
        <input type="number" name="nevnapnap" value="<?php echo($user["NEVNAPNAP"]);?>" min="1" max="31"required >Nap

        <hr/>
        <br/><button type="submit">Mentés</button>
    </form>

    </body>
</html>