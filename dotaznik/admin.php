
 
<?php
$host = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'skola';
function MySQL_pripoj(){
  $pdo = new PDO ('mysql:host='.$host.';dbname='.$db, $user, $pass);
  //$pdo = new PDO ('mysql:host = localhost;dbname=skola', 'root', 'root');
  if($pdo->connect_error){

    die('Nepodařilo se připojit k MySQL serveru');

  }
}
function MySQL_odpoj($pdo)
{
  $pdo->close();
}

function MySQL_dotaz($pdo,$text){

  $vysledek = $pdo->query($text);
  if(!$vysledek)
  {
  
    die('Nepodařilo se získat data');
  
  }
  return $vysledek;
  }
/*
$vysledek = $pdo->prepare('SELECT * FROM studenti LIMIT 1');
$vysledek->execute();
while ($student = $vysledek->fetch(PDO::FETCH_ASSOC)){
*/
?>