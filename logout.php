<?php 
  include "zacatek.php";
  ?>
  
  <style>
  body{ background-color: #ffa500;}
  #zprava_o_ohlaseni {text-align:center; position: relative; top: 35px;}
  </style>
  <title>Odhlášení</title>
  </head>
  <body>
<?php 
  include "funkce.php";
  include "head.php";
  unset($_SESSION["logged"]);
 if(empty($_SESSION["logged"])) {
 
  echo "<div id=\"zprava_o_ohlaseni\">";
  echo "<p>"."Byli jste úspešně odhlášeni". "</p>";
  echo "<p>"."Pokračujte kliknutím ". "<a href=\"index.php\">"." zde ". "</p>";
  echo "</div>";
 }
include 'foot.php';
?>  