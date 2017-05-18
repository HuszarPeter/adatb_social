<html>
    <head>
        <title>Social</title>
    </head>
</html>
<body>
    <form method="post" action="reg.php">
        Usernév:<br/><input type="text" name="usernev" value="" required ><br/>
        Email:<br/><input type="email" name="email" value="" required ><br/>
        Jelszó:<br/><input type="password" name="jelszo" value="" required ><br/> 
        Jelszó megerősítés:<br/><input type="password" name="jelszo2" value="" required ><br/>
        Családnév:<br/><input type="text" name="vezeteknev" value="" ><br/>
        Keresztnév:<br/><input type="text" name="keresztnev" value="" ><br/>
        Születési dátum:<br/><input type="date" name="szulido" value="" ><br/>
        Névnap:<br/>
        Hó:<input type="number" name="nevnapho" min="1" max="12">
        Nap:<input type="number" name="nevnapnap" min="1" max="31"><br/>
        <br/><button type="submit">Regisztráció</button><br/>
        <a href="index.php" >Vissza</a>
    </form>
</body>

<?php

echo("REGISZTRÁCIÓ");

?>