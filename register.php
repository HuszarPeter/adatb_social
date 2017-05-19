<html>
    <head>
        <title>Social</title>
    </head>
</html>
<script>
function validate(form) {
  var e = form.elements;

  /* Your validation code. */

  if(e['jelszo'].value != e['jelszo2'].value) {
    alert('A két jelszó nem eggyezik meg!');
    return false;
  }
  return true;
}
</script>
<body>
    <form method="post" action="reg.php" onsubmit="return validate(this);">
        Usernév:<br/><input type="text" name="usernev" value="" required ><br/>
        Email:<br/><input type="email" name="email" value="" required ><br/>
        Jelszó:<br/><input type="password" id="jelszo" name="jelszo" value="" required ><br/> 
        Jelszó megerősítés:<br/><input type="password" id="jelszo2" name="jelszo2" value="" required ><br/>
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