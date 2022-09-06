<?php  
include "zacatek.php";
include "funkce.php";
?>

<style>

input[type="text"], textarea { background-color : white; width: 100%; min-height: 50px;}

</style>
<title>Vkládání</title>
</head>
<body id="vkladani">
<?php
include "head.php";
echo "<div class=\"body\">";
if(isset($_SESSION["logged"])){
$spojeni = MySQL_pripoj();
if(isset($_POST["save"])) {
	  echo "Vložili jste následující údaje: ";
    echo "<br>";
    echo "Autor: ".$_POST["autor"];
    echo "<br>";
    echo "Příběh: ".$_POST["pribeh"];
    echo "<br>";
    $vysledek = MySQL_dotaz($spojeni,"INSERT INTO pribehy_prima (napsal , autor , pribeh , level)
    VALUES (".$_SESSION["logged"].",\"".$_POST["autor"]."\",\"".$_POST["pribeh"]."\",1)");
    
  /*  }else if(isset($_GET["id"])){
    
    if (isset($_POST["delete"])){
    
    $vysledek = MySQL_dotaz($spojeni,"DELETE FROM `ShareSQL_poznamky_zaboj` WHERE  
               `id` = " .$_GET["id"]);
            
            }else if(isset($_POST["update"])){   
           
   $vysledek = MySQL_dotaz($spojeni,"UPDATE ShareSQL_poznamky_zaboj
    SET autor=".$_SESSION["logged"].",nazev=\"".$_POST["nazev"]
    ."\",obsah=\"".$_POST["obsah"]."\", level=1
    WHERE id=".$_GET["id"]);
     
     
  }else{
     
     
     $obsah = MySQL_dotaz($spojeni,"SELECT * FROM ShareSQL_poznamky_zaboj WHERE `autor` = " .$_GET["autor"]." AND `id` = " .$_GET["id"]. "  UNION
                          SELECT * FROM ShareSQL_poznamky_Hrouda WHERE `autor` = " .$_GET["autor"]." AND  `id` = " .$_GET["id"]. " UNION 
                          SELECT * FROM ShareSQL_poznamky_zelinka WHERE `autor` = " .$_GET["autor"]." AND  `id` = " .$_GET["id"]. " UNION 
                          SELECT * FROM xhradil_poznamky WHERE `autor` = " .$_GET["autor"]." AND `id` = " .$_GET["id"]);
    
  }
 */ 
  }else{} 
    
  MySQL_odpoj($spojeni);


if(isset($_POST['vybrani_rocniku'])){ 
  $rocnik = $_POST['rocnik'];
 
 ?>
 
  
  <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
//<![CDATA[
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
  
 <form action="#" method="post">
  Autor: <input type="text" name="autor" style="width: 300px; height: 10px;"> <br>
  Příspěvek:<textarea name="pribeh">
  </textarea>                        
	  <input type="submit" value="Uložit" name="save">
  </form>
 
 <?php
 if($rocnik == "prima") {
 
 unset ($_POST['save']);
 
 }/*else if($rocnik == "sekunda"){
 
 echo "s";
 
 }else if($rocnik == "tercie"){
 
 echo "t";
 
 }else if($rocnik == "kvarta"){

 echo "k";
 
 }*/else{
 
 echo "Nevybrán žádný ročník!";
 
 unset ($_POST['vybrani_rocniku']);
 
 }
   
} 

 

?>

 <?php
 if(!isset($_POST['vybrani_rocniku'])){
?>
<p>
K jakému ročníku se vztahuje Váš příspěvek?
<form action="#" method="post">
<select name="rocnik">
  <option value="">Vyberte si...</option>
  <option value="prima">Prima</option>
 <?php /* <option value="sekunda">Sekunda</option>
  <option value="tercie">Tercie</option>
  <option value="kvarta">Kvarta</option> */ ?>
</select>
<input type="submit" value="Vybrat" name="vybrani_rocniku">
</form>
</p>

<?php 
}
}
else{

echo "Stránka nenalezena."."<br>";
echo "Vámi hledaný obsah bohužel neexistuje.";

}

echo "</div>";
include "foot.php";
?>