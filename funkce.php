<?php

include "funkce/funkce.inc.php";
function MySQL_pripoj()
{
global $migrantzosloveska_first, $migrantzosloveska_second, $migrantzosloveska_last;
$spojeni = new mysqli ($migrantzosloveska_first, $migrantzosloveska_second, $migrantzosloveska_last, 'test');
if($spojeni->connect_error){

    die('Nepodařilo se připojit k MySQL serveru');

}
return $spojeni;
}
function MySQL_odpoj($spojeni)
{
  $spojeni->close();
}

function MySQL_dotaz($spojeni,$text){

$vysledek = $spojeni->query($text);
if(!$vysledek)
{

  die('Nepodařilo se získat data');

}else

return $vysledek;
}

function MySQL_zobraz($vysledek)
{                                
?><table><?php 
  while ($uzivatel = $vysledek->fetch_assoc())
  { ?><tr><?php
      //printf("%s %s \n", $uzivatel['Jmeno'], $uzivatel['Prijmeni']);
      //print_r($uzivatel); ?>
      <td><?php echo $uzivatel["id"]?></td>
      <td><?php echo $uzivatel["jmeno"]?></td>
      <td><?php echo $uzivatel["prijmeni"]?></td>
    </tr><?php
    
  } 
  $vysledek->free_result();
?></table><?php
} 

?>