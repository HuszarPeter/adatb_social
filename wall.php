<?php

require_once("lib/functions.php");

?>

<html>
    <head>
        <title>SOCIAL</title>
    </head>
    <body>
        <p>User id : <?php echo($_SESSION["user"]); ?></p>
<?php

    $users = q("SELECT * FROM FELHASZNALO");

    dump($users);

?>

        <a href="logout.php">Kijelentkezés</a>
    </body>
</hrml>