<?php
include("blocks/db.php");
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
<form action="drop_post.php" method="post" name="form">
<?php
      $result = mysql_query("SELECT id,title FROM date",$db);
      $myrow = mysql_fetch_array($result);
      echo "Виберіть замітку, яку ви бажаєте видалити";
      do
      {
        printf("<p><input name='delete' type='radio' value='%s'><lable>%s<lable></p>",$myrow['id'], $myrow['title']);
      }

      while($myrow = mysql_fetch_array($result));


?>


<p><input type="submit" name="submit" id="submit" value="Удалити"></p>

</form>








  </tr>
       </table>
        


       </td>
    </tr>

    
      <?php include("blocks/footer.php");?>

  </table>

</body>
</html>