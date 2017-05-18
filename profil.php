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
        

    ?>
    <h1>Profil</h1>
    <form method="post" action="profil_edit.php" class="profil">
        <div class="lbl">Felhasználónév:</div>
        <input type="text" name="usernev" value="<?php echo($user["FELHASZNALO_NEV"]);?>" required ><br/>
     
        <div class="lbl">Email:</div>
        <input type="email" name="email" value="<?php echo($user["EMAIL"]);?>" required ><br/>

        <div class="lbl">Név:</div>
        <input type="text" name="vezeteknev" value="<?php echo($user["VEZETEKNEV"]);?>" required ><br/>
        <input type="text" name="keresztnev" value="<?php echo($user["KERESZTNEV"]);?>" required ><br/>

        <div class="lbl">Születésnap:</div>
        <div><?php echo($user["SZULETETT"]);?></div>
        <input type="date" name="datum" value="2013-01-22" required ><br/>

        <div class="lbl">Névnap:</div>
        <div><?php echo($honapok[$user["NEVNAPHONAP"]-1]);?> <?php echo($user["NEVNAPNAP"]);?></div>
        <input type="number" name="nevnaphu" value="<?php echo($user["NEVNAPHONAP"]);?>" required ><br/>

        <hr/>
        <br/><button type="submit">OK</button>
    </form>

    </body>
</html>