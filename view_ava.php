 <?php
include("blocks/db.php");
 $login = $_COOKIE['login'];

         
          
         $result_ava = mysql_query("INSERT INTO register (ava) VALUES ($f)  WHERE login='$login'",$db);
  if($result_ava == "true"){
    echo "Well";
  }
   else{
    echo "wrong";
   }
            
?>