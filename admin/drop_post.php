<?php
include("blocks/db.php");
if(isset($_POST["delete"])){ $delete = $_POST["delete"]; }   // якщо змінна незаповнена то її удалить , і невідбудиться условия через неіснування змінної!!!
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Кабінет адміністратора</title>
  </head>
<body>
  <table id="table1">
      <?php include("blocks/header.php"); ?>

  
    <tr>
       <td>
       
       <table id="table2">
          <tr>
            <? include("blocks/left.php"); ?>
             <td width="508" id="content">
              <!-- content -->

<!--НАПИСАНО БЕЗ ПРОВІРОК-->

<?php


if(isset($delete)){

  
  $result = mysql_query("DELETE FROM date WHERE id='$delete'",$db);
    if($result == "true"){ echo "Успішно видалено";}
 
else { echo  "Невдалося видалити"; }


}


else{
  echo "оберіть будь-ласка що ви бажаєте видалити";
}
?>

 










  </tr>
       </table>
        


       </td>
    </tr>

    
      <?php include("blocks/footer.php");?>

  </table>

</body>
</html>