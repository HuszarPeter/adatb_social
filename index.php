<?php
    session_start();
    if (isset($_SESSION["user"]))
    {
        // redirect to inner page
        header("Location: wall.php");
        exit();
    }
?>
<html>
    <head>
        <title>Social</title>
    </head>
</html>
<body>
    <form method="post" action="login.php">
        Usernév:<br/><input type="text" name="usernev" value="Huszár" ><br/>
        Jelszó:<br/><input type="password" name="jelszo" value="Jelszo123" /> 
        <br/><button type="submit">Login</button><br/>
        <a href="register.php" >Regisztráció</a>
    </form>
</body>