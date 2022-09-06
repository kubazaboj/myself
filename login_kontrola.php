<?php 
  include "zacatek.php";
  ?>
  
  <style>
  body{ background-color: #ffa500;}
  .zprava_o_prihlaseni {text-align:center; position: relative; top: 35px;}
  </style>
  <title>Login</title>
  </head>
  <body>
  
  <?php
  include 'funkce.php';
  include "head.php";
  $login = $_POST["login"];
  $heslo = $_POST["heslo"];
  $spojeni = MySQL_pripoj();
  $vysledek = MySQL_dotaz($spojeni,"SELECT * FROM `uzivatele` 
  WHERE login = '$login' AND heslo = '$heslo'");
  
  $uzivatel = $vysledek->fetch_assoc();                          
  if(empty($uzivatel)) {
    echo "<div class=\"zprava_o_prihlaseni\">"."<p>"."Neplatné přihlašovací údaje!"."</p>".
          "<p>"."Pokud chtete svůj pokus o přihlášení opakovat, klikněte "."
          <a href=\"login.php\">"." zde "."</a>"."</p>"."</div>";
    
  } else {
    echo "<div class=\"zprava_o_prihlaseni\">"."<p>"."Je přihlášen uživatel ".$uzivatel['login']
    . "</p>"."<p>"."Pro pokračování klikněte "."
          <a href=\"index.php\">"." zde "."</a>"."</p>"."</div>";
    $_SESSION["logged"] = $uzivatel["id"];
  }

MySQL_zobraz($vysledek);
MySQL_odpoj($spojeni);
include "foot.php";
?>