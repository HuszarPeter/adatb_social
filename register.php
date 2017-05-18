<html>
    <head>
        <title>Social</title>
    </head>
</html>
<body>
    <form method="post" action="reg.php">
        Usernév:<br/><input type="text" name="usernev" value="" ><br/>
        Jelszó:<br/><input type="password" name="jelszo" value=""><br/> 
        Jelszó megerősítés:<br/><input type="password" name="jelszo2" value=""><br/>
        Családnév:<br/><input type="text" name="csaladnev" value="" ><br/>
        Keresztnév:<br/><input type="text" name="keresztnev" value="" ><br/>
        Születési dátum:<br/><input type="date" name="szulido" value="" ><br/>
        Névnap:<br/><input type="date" name="nevnap" value="" ><br/>
        <br/><button type="submit">Regisztráció</button><br/>
        <a href="index.php" >Vissza</a>
    </form>
</body>

<?php

echo("REGISZTRÁCIÓ");

?>