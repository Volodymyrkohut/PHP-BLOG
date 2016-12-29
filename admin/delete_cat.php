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
  	   
       <table id="table2" >
          <tr>
            <? include("blocks/left.php"); ?>
             <td width="508" id="content">
             
             <form action="drop_cat.php" method="post" name="form">
              <?php 
              $result = mysql_query("SELECT id, title FROM categories",$db);
              $myrow = mysql_fetch_array($result);

              do
              {
              printf("<p><lable><input type='radio' name='id' value='%s'>%s</lable></p>",$myrow['id'],$myrow['title']);
              }  
            
              while($myrow = mysql_fetch_array($result));


              ?>

              <input type="submit" name="submit" value="Видалити">
              </form>










          </tr>
       </table>
  			


  	   </td>
  	</tr>

  	
  		<?php include("blocks/footer.php");?>

  </table>

</body>
</html>