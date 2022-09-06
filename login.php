<?php
include "zacatek.php";
include "funkce.php";
?>  
  <style>
  #login {position: relative; top: 40px; margin-left: 720px;}
  </style>
  <title>Přihlášení</title>
  </head>
  <body>
<?php
include "head.php";

?>
<div>
<form method="POST" id="login" action="login_kontrola.php">

Jméno
<br>
<input type="text" name="login"><br>
Heslo<br>
<input type="password" name="heslo"><br>
<input type="submit" name="submit" value="Přihlásit">
</form>
</div>